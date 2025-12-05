<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::with('branch')
            ->orderBy('order')
            ->orderBy('name')
            ->get();
        
        $branches = \App\Models\Branch::whereIn('type', ['okul-oncesi', 'ilkokul', 'ortaokul', 'anadolu-lisesi', 'fen-lisesi'])
            ->orderByRaw("CASE 
                WHEN type = 'okul-oncesi' THEN 1
                WHEN type = 'ilkokul' THEN 2
                WHEN type = 'ortaokul' THEN 3
                WHEN type = 'anadolu-lisesi' THEN 4
                WHEN type = 'fen-lisesi' THEN 5
                ELSE 6
            END")
            ->get();

        return view('admin.news.index', compact('categories', 'branches'));
    }

    public function getNews()
    {
        $news = News::with('branch', 'category')->orderBy('created_at', 'desc')->get();
        return DataTables::of($news)
            ->addColumn('image_preview', function($row){
                if ($row->image_path) {
                    $path = str_starts_with($row->image_path, 'http') 
                        ? $row->image_path 
                        : (str_starts_with($row->image_path, 'storage/') 
                            ? asset($row->image_path) 
                            : (str_starts_with($row->image_path, 'images/') 
                                ? asset($row->image_path) 
                                : asset('storage/' . $row->image_path)));
                    return '<img src="' . $path . '" alt="Haber görseli" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">';
                }
                return '<span class="text-muted">Yok</span>';
            })
            ->addColumn('status', function($row){
                if ($row->published_at && $row->published_at <= now()) {
                    return '<span class="badge bg-success">Yayında</span>';
                } elseif ($row->published_at && $row->published_at > now()) {
                    return '<span class="badge bg-warning text-dark">Zamanlanmış</span>';
                } else {
                    return '<span class="badge bg-secondary">Taslak</span>';
                }
            })
            ->addColumn('published_date', function($row){
                return $row->published_at ? $row->published_at->format('d.m.Y H:i') : '-';
            })
            ->addColumn('branch_name', function($row){
                return $row->branch ? $row->branch->name : '<span class="text-muted">Genel</span>';
            })
            ->addColumn('category_name', function($row){
                return $row->category ? $row->category->name : '<span class="text-muted">-</span>';
            })
            ->addColumn('action', function($row){
                $editBtn = '<button class="btn btn-sm btn-primary edit me-2" data-id="'.$row->id.'" title="Düzenle" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>';
                $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'" data-title="'.$row->title.'" title="Sil" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['image_preview', 'status', 'branch_name', 'category_name', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $rules = [
            'branch_id' => 'nullable|exists:branches,id',
            'news_category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:news,slug,' . ($request->news_id ?? 'NULL'),
            'content' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'published_at' => 'nullable|date',
        ];

        $validated = $request->validate($rules);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('news', 'public');
        } elseif ($request->news_id) {
            // Mevcut resmi koru
            $existingNews = News::find($request->news_id);
            $imagePath = $existingNews ? $existingNews->image_path : null;
        }

        $newsData = [
            'branch_id' => $request->branch_id ?: null,
            'news_category_id' => $request->news_category_id,
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'content' => $request->content,
            'published_at' => $request->published_at ? now()->parse($request->published_at) : null,
        ];

        if ($imagePath) {
            $newsData['image_path'] = $imagePath;
        }

        News::updateOrCreate(
            ['id' => $request->news_id],
            $newsData
        );

        return response()->json(['success' => 'Haber başarıyla kaydedildi!']);
    }

    public function edit($id)
    {
        $news = News::with('branch', 'category')->find($id);
        if (!$news) {
            return response()->json(['error' => 'Haber bulunamadı!'], 404);
        }
        return response()->json($news);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        
        if (!$news) {
            return response()->json(['error' => 'Haber bulunamadı!'], 404);
        }

        // Resmi sil
        if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();
        
        return response()->json(['success' => 'Haber başarıyla silindi!']);
    }
}
