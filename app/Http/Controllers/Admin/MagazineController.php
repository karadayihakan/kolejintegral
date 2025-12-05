<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MagazineController extends Controller
{
    public function index()
    {
        return view('admin.magazines.index');
    }

    public function getMagazines()
    {
        $magazines = Magazine::orderBy('created_at', 'desc')->get();
        return DataTables::of($magazines)
            ->addColumn('thumbnail_preview', function($row) {
                if (!$row->thumbnail_path) {
                    return '<span class="text-muted">Yok</span>';
                }

                $path = $row->thumbnail_path;

                // Eğer tam URL ise aynen kullan
                if (Str::startsWith($path, ['http://', 'https://'])) {
                    $url = $path;
                } else {
                    // storage ile başlıyorsa asset() ile sar
                    if (Str::startsWith($path, 'storage/')) {
                        $url = asset($path);
                    } else {
                        // Varsayılan: public disk altında saklanan dosya
                        $url = asset('storage/' . ltrim($path, '/'));
                    }
                }

                return '<img src="' . e($url) . '" style="width: 80px; height: 100px; object-fit: contain; border-radius: 5px;">';
            })
            ->addColumn('action', function($row) {
                $editBtn = '<button class="btn btn-sm btn-primary edit me-2" data-id="'.$row->id.'" title="Düzenle" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>';
                $deleteBtn = '<button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'" data-title="'.$row->name.'" title="Sil" style="padding: 0.25rem 0.5rem;">
                    <svg style="width: 1rem; height: 1rem; display: inline-block; vertical-align: middle;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['thumbnail_preview', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $magazine = Magazine::updateOrCreate(
            ['id' => $request->magazine_id],
            ['name' => $request->name]
        );

        if ($request->hasFile('pdf')) {
            if ($magazine->pdf_path) {
                Storage::disk('public')->delete($magazine->pdf_path);
            }
            $magazine->pdf_path = $request->file('pdf')->store('magazines', 'public');
            $magazine->save();
        }

        if ($request->hasFile('thumbnail')) {
            if ($magazine->thumbnail_path) {
                Storage::disk('public')->delete($magazine->thumbnail_path);
            }
            $magazine->thumbnail_path = $request->file('thumbnail')->store('magazines/thumbnails', 'public');
            $magazine->save();
        }

        return response()->json(['success' => 'Dergi başarıyla kaydedildi!']);
    }

    public function edit($id)
    {
        $magazine = Magazine::findOrFail($id);
        return response()->json($magazine);
    }

    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);
        
        if ($magazine->pdf_path) {
            Storage::disk('public')->delete($magazine->pdf_path);
        }
        if ($magazine->thumbnail_path) {
            Storage::disk('public')->delete($magazine->thumbnail_path);
        }
        
        $magazine->delete();

        return response()->json(['success' => 'Dergi başarıyla silindi!']);
    }
}
