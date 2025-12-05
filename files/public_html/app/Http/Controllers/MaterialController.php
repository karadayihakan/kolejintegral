<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index($slug)
    {
        $branch = Branch::where('slug', $slug)->firstOrFail();
        return view('branch.admin.material.index', compact('branch', 'slug'));
    }

    // Fetch data for DataTable
    public function getData($slug)
    {
        $branch = Branch::where('slug', $slug)->firstOrFail();
        $materials = Material::where('branch_id', $branch->id)->get();

        return datatables()->of($materials)
            ->addColumn('image', function($row) {
                return '<img src="'.asset('storage/'.$row->image).'" width="50" height="50" />';
            })
            ->addColumn('actions', function($row) use ($branch) {
                return '
                    <button class="btn btn-primary btn-sm editMaterial" data-id="'.$row->id.'">Düzenle</button>
                    <button class="btn btn-danger btn-sm deleteMaterial" data-id="'.$row->id.'">Sil</button>
                ';
            })
            ->rawColumns(['image', 'actions'])
            ->make(true);
    }

    public function store(Request $request, $slug)
    {
        $branch = Branch::where('slug', $slug)->firstOrFail();

        $request->validate([
            'image' => 'required|image',
            'price' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('materials', 'public');

        Material::updateOrCreate(
            ['branch_id' => $branch->id, 'id' => $request->id], // Add 'id' for updating
            [
                'image' => $imagePath,
                'price' => $request->price,
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        return response()->json(['success' => 'Materyal başarıyla kaydedildi!']);
    }

    public function edit($slug, $id)
    {
        $material = Material::findOrFail($id);
        return response()->json($material);
    }

    public function destroy($slug, $id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return response()->json(['success' => 'Materyal başarıyla silindi!']);
    }
}
