<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\RegisterPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function getPages()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();
        return DataTables::of($pages)
            ->addColumn('status', function($row){
                return $row->is_active 
                    ? '<span class="badge bg-success">Aktif</span>' 
                    : '<span class="badge bg-secondary">Pasif</span>';
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
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . ($request->page_id ?? 'NULL'),
            'description' => 'nullable|string',
            'template' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $slug = $request->slug ?: Str::slug($request->title);

        $page = Page::updateOrCreate(
            ['id' => $request->page_id],
            [
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description ?? '',
                'template' => $request->template ?? 'default',
                'is_active' => $request->has('is_active') && $request->is_active == '1' ? true : false,
            ]
        );

        return response()->json(['success' => 'Sayfa başarıyla kaydedildi!', 'page' => $page]);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return response()->json($page);
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $id,
            'description' => 'nullable|string',
            'template' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $slug = $request->slug ?: Str::slug($request->title);

        $page->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'template' => $request->template ?? 'default',
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return response()->json(['success' => true, 'message' => 'Sayfa başarıyla güncellendi.', 'page' => $page]);
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json(['success' => true, 'message' => 'Sayfa başarıyla silindi.']);
    }

    // Section methods
    public function storeSection(Request $request, $pageId)
    {
        $request->validate([
            'section_key' => 'required|string|max:255',
            'section_type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $page = Page::findOrFail($pageId);

        $section = PageSection::create([
            'page_id' => $pageId,
            'section_key' => $request->section_key,
            'section_type' => $request->section_type,
            'title' => $request->title,
            'content' => $request->content,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return response()->json(['success' => true, 'message' => 'Bölüm başarıyla eklendi.', 'section' => $section]);
    }

    public function editSection($pageId, $sectionId)
    {
        $section = PageSection::where('page_id', $pageId)->findOrFail($sectionId);
        return response()->json($section);
    }

    public function updateSection(Request $request, $pageId, $sectionId)
    {
        $request->validate([
            'section_key' => 'required|string|max:255',
            'section_type' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $section = PageSection::where('page_id', $pageId)->findOrFail($sectionId);

        $section->update([
            'section_key' => $request->section_key,
            'section_type' => $request->section_type,
            'title' => $request->title,
            'content' => $request->content,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return response()->json(['success' => true, 'message' => 'Bölüm başarıyla güncellendi.', 'section' => $section]);
    }

    public function destroySection($pageId, $sectionId)
    {
        $section = PageSection::where('page_id', $pageId)->findOrFail($sectionId);
        $section->delete();

        return response()->json(['success' => true, 'message' => 'Bölüm başarıyla silindi.']);
    }

    // Dosya yükleme endpoint'i (CKEditor için)
    public function uploadFile(Request $request)
    {
        $request->validate([
            'upload' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('editor_uploads', $filename, 'public');
            $url = Storage::disk('public')->url($path);

            return response()->json([
                'uploaded' => true,
                'url' => $url,
                'filename' => $filename
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => ['message' => 'Dosya yüklenemedi']
        ], 400);
    }

    // PDF yükleme sayfası (manuel yükleme için)
    public function uploadPage()
    {
        return view('admin.pages.upload');
    }
}
