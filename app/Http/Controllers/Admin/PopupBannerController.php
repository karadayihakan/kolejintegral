<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopupBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PopupBannerController extends Controller
{
    public function index()
    {
        return view('admin.popup-banner.index');
    }

    public function data(Request $request)
    {
        $query = PopupBanner::query()->orderBy('id', 'desc');

        return datatables()->of($query)
            ->addColumn('is_active_label', function (PopupBanner $banner) {
                return $banner->is_active ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Pasif</span>';
            })
            ->addColumn('background_preview', function (PopupBanner $banner) {
                if (!$banner->background_image) {
                    return '-';
                }

                $path = $banner->background_image;
                if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                    $src = $path;
                } elseif (str_starts_with($path, 'storage/')) {
                    $src = asset($path);
                } elseif (str_starts_with($path, '/storage/')) {
                    $src = $path;
                } elseif (str_starts_with($path, 'images/')) {
                    $src = asset($path);
                } elseif (str_starts_with($path, '/images/')) {
                    $src = $path;
                } else {
                    $src = asset('storage/'.$path);
                }

                return '<img src="'.e($src).'" alt="'.e($banner->title).'" style="height:60px;object-fit:cover;border-radius:4px;">';
            })
            ->addColumn('link', function (PopupBanner $banner) {
                return $banner->link ? '<a href="'.e($banner->link).'" target="_blank">'.e($banner->link).'</a>' : '-';
            })
            ->addColumn('action', function (PopupBanner $banner) {
                return view('admin.popup-banner.partials.actions', compact('banner'))->render();
            })
            ->rawColumns(['background_preview', 'link', 'is_active_label', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => ['nullable', 'integer', 'exists:popup_banners,id'],
            'title' => ['required', 'string', 'max:255'],
            'link' => ['nullable', 'string', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'background' => ['nullable', 'image', 'max:4096'],
        ]);

        $isUpdate = !empty($data['id']);

        $banner = $isUpdate ? PopupBanner::findOrFail($data['id']) : new PopupBanner();

        $banner->title = $data['title'];
        $banner->link = $data['link'] ?? null;
        
        // Eğer aktif yapılıyorsa, diğer aktif popupları pasif yap
        if ($request->boolean('is_active')) {
            $excludeId = $isUpdate ? $banner->id : 0;
            PopupBanner::where('id', '!=', $excludeId)
                ->where('is_active', true)
                ->update(['is_active' => false]);
            $banner->is_active = true;
        } else {
            $banner->is_active = false;
        }

        if ($request->hasFile('background')) {
            if ($isUpdate && $banner->background_image) {
                Storage::disk('public')->delete($banner->background_image);
            }
            $path = $request->file('background')->store('popup-banners', 'public');
            $banner->background_image = $path;
        }

        $banner->save();

        return response()->json([
            'status' => 'success',
            'message' => $isUpdate ? 'Popup banner güncellendi.' : 'Popup banner oluşturuldu.',
        ]);
    }

    public function edit($id)
    {
        $banner = PopupBanner::findOrFail($id);

        return response()->json($banner);
    }

    public function destroy($id)
    {
        $banner = PopupBanner::findOrFail($id);
        
        if ($banner->background_image) {
            Storage::disk('public')->delete($banner->background_image);
        }
        
        $banner->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Popup banner silindi.',
        ]);
    }
}
