<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class NewsCategoryController extends Controller
{
    public function index()
    {
        return view('admin.news-categories.index');
    }

    public function getCategories()
    {
        $categories = NewsCategory::orderBy('order')->orderBy('name')->get();
        return DataTables::of($categories)
            ->addColumn('status', function($row){
                return $row->is_active 
                    ? '<span class="badge bg-success">Aktif</span>' 
                    : '<span class="badge bg-secondary">Pasif</span>';
            })
            ->addColumn('news_count', function($row){
                return $row->news()->count();
            })
            ->addColumn('action', function($row){
                $editBtn = '<button class="btn btn-sm btn-primary edit me-2" data-id="'.$row->id.'" title="Düzenle" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>';
                $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'" data-name="'.$row->name.'" title="Sil" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active'),
        ]);

        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news_categories,slug,' . ($request->category_id ?? 'NULL'),
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ];

        $validated = $request->validate($rules);

        $categoryData = [
            'branch_id' => null, // Kategoriler birime bağlı değil
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'order' => $request->order ?? 0,
            'is_active' => $request->boolean('is_active'),
        ];

        NewsCategory::updateOrCreate(
            ['id' => $request->category_id],
            $categoryData
        );

        return response()->json(['success' => 'Kategori başarıyla kaydedildi!']);
    }

    public function edit($id)
    {
        $category = NewsCategory::find($id);
        if (!$category) {
            return response()->json(['error' => 'Kategori bulunamadı!'], 404);
        }
        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = NewsCategory::find($id);
        
        if (!$category) {
            return response()->json(['error' => 'Kategori bulunamadı!'], 404);
        }

        // Kategoriye ait haber var mı kontrol et
        if ($category->news()->count() > 0) {
            return response()->json(['error' => 'Bu kategoriye ait haberler bulunmaktadır. Önce haberleri silin veya başka bir kategoriye taşıyın.'], 422);
        }

        $category->delete();
        
        return response()->json(['success' => 'Kategori başarıyla silindi!']);
    }
}
