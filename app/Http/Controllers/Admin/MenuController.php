<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Branch;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu.index');
    }

    public function data(Request $request)
    {
        $branchId = $request->get('branch_id');
        
        $query = Menu::with('branch')->orderBy('order')->orderByDesc('id');

        if ($branchId) {
            $query->where('branch_id', $branchId);
        } else {
            $query->whereNull('branch_id');
        }

        return datatables()->of($query)
            ->addColumn('branch_name', function (Menu $menu) {
                return $menu->branch ? $menu->branch->name : 'Genel';
            })
            ->addColumn('is_active_label', function (Menu $menu) {
                return $menu->is_active ? 'Aktif' : 'Pasif';
            })
            ->addColumn('target_label', function (Menu $menu) {
                return $menu->target === '_blank' ? 'Yeni Sekme' : 'Aynı Sekme';
            })
            ->addColumn('action', function (Menu $menu) {
                return view('admin.menu.partials.actions', compact('menu'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => ['nullable', 'integer', 'exists:menus,id'],
            'label' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:2048'],
            'branch_id' => ['nullable', 'integer', 'exists:branches,id'],
            'target' => ['nullable', 'in:_self,_blank'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'parent_id' => ['nullable', 'integer', 'exists:menus,id'],
        ]);

        $isUpdate = !empty($data['id']);

        $menu = $isUpdate ? Menu::findOrFail($data['id']) : new Menu();

        $menu->label = $data['label'];
        $menu->url = $data['url'];
        $menu->branch_id = $data['branch_id'] ?? null;
        $menu->target = $data['target'] ?? '_self';
        $menu->order = $data['order'] ?? 0;
        $menu->is_active = $request->boolean('is_active');
        $menu->parent_id = $data['parent_id'] ?? null;

        $menu->save();

        return response()->json([
            'status' => 'success',
            'message' => $isUpdate ? 'Menü öğesi güncellendi.' : 'Menü öğesi oluşturuldu.',
        ]);
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return response()->json($menu);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Menü öğesi silindi.',
        ]);
    }
}
