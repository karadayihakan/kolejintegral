<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Branch;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index');
    }

    public function data(Request $request)
    {
        $query = Gallery::with('branch')->orderBy('order')->orderByDesc('id');

        return datatables()->of($query)
            ->addColumn('branch_name', function (Gallery $gallery) {
                return $gallery->branch ? $gallery->branch->name : 'Genel';
            })
            ->addColumn('type_label', function (Gallery $gallery) {
                return $gallery->type === 'video' ? 'Video' : 'Görsel';
            })
            ->addColumn('is_active_label', function (Gallery $gallery) {
                return $gallery->is_active ? 'Aktif' : 'Pasif';
            })
            ->addColumn('preview', function (Gallery $gallery) {
                if ($gallery->type === 'video' && $gallery->video_url) {
                    return '<a href="'.e($gallery->video_url).'" target="_blank">Videoyu Aç</a>';
                }

                $src = '';
                if ($gallery->image_path) {
                    $path = $gallery->image_path;

                    if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                        $src = $path;
                    } elseif (str_starts_with($path, 'storage/')) {
                        $src = asset($path);
                    } elseif (str_starts_with($path, 'images/')) {
                        $src = asset($path);
                    } else {
                        $src = asset('storage/'.$path);
                    }
                }

                if (!$src) {
                    return '-';
                }

                return '<img src="'.e($src).'" alt="'.e($gallery->title ?? '').'" style="height:60px;object-fit:cover;border-radius:4px;">';
            })
            ->addColumn('action', function (Gallery $gallery) {
                return view('admin.gallery.partials.actions', compact('gallery'))->render();
            })
            ->rawColumns(['preview', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => ['nullable', 'integer', 'exists:galleries,id'],
            'title' => ['nullable', 'string', 'max:255'],
            'branch_id' => ['nullable', 'integer', 'exists:branches,id'],
            'type' => ['required', 'in:photo,video'],
            'video_url' => ['nullable', 'string', 'max:2048'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $isUpdate = !empty($data['id']);

        $gallery = $isUpdate ? Gallery::findOrFail($data['id']) : new Gallery();

        $gallery->title = $data['title'] ?? null;
        $gallery->branch_id = $data['branch_id'] ?? null;
        $gallery->type = $data['type'];
        $gallery->video_url = $data['type'] === 'video' ? ($data['video_url'] ?? null) : null;
        $gallery->order = $data['order'] ?? 0;
        $gallery->is_active = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $gallery->image_path = $path;
        }

        $gallery->save();

        return response()->json([
            'status' => 'success',
            'message' => $isUpdate ? 'Keşfet öğesi güncellendi.' : 'Keşfet öğesi oluşturuldu.',
        ]);
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return response()->json($gallery);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Keşfet öğesi silindi.',
        ]);
    }
}
