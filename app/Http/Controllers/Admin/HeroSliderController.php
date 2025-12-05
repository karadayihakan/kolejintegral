<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;

class HeroSliderController extends Controller
{
    public function index()
    {
        return view('admin.hero.index');
    }

    public function data(Request $request)
    {
        $query = HeroSlider::query()->ordered();

        return datatables()->of($query)
            ->addColumn('is_active_label', function (HeroSlider $slide) {
                return $slide->is_active ? 'Aktif' : 'Pasif';
            })
            ->addColumn('background_preview', function (HeroSlider $slide) {
                if (!$slide->background_image) {
                    return '-';
                }

                $path = $slide->background_image;
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

                return '<img src="'.e($src).'" alt="'.e($slide->title).'" style="height:60px;object-fit:cover;border-radius:4px;">';
            })
            ->addColumn('action', function (HeroSlider $slide) {
                return view('admin.hero.partials.actions', compact('slide'))->render();
            })
            ->rawColumns(['background_preview', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => ['nullable', 'integer', 'exists:hero_sliders,id'],
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:500'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:2048'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'background' => ['nullable', 'image', 'max:4096'],
        ]);

        $isUpdate = !empty($data['id']);

        $slide = $isUpdate ? HeroSlider::findOrFail($data['id']) : new HeroSlider();

        $slide->title = $data['title'];
        $slide->subtitle = $data['subtitle'] ?? null;
        $slide->button_text = $data['button_text'] ?? null;
        $slide->button_url = $data['button_url'] ?? null;
        $slide->order = $data['order'] ?? 0;
        $slide->is_active = $request->boolean('is_active');

        if ($request->hasFile('background')) {
            $path = $request->file('background')->store('hero', 'public');
            $slide->background_image = $path;
        }

        $slide->save();

        return response()->json([
            'status' => 'success',
            'message' => $isUpdate ? 'Hero slaytı güncellendi.' : 'Hero slaytı oluşturuldu.',
        ]);
    }

    public function edit($id)
    {
        $slide = HeroSlider::findOrFail($id);

        return response()->json($slide);
    }

    public function destroy($id)
    {
        $slide = HeroSlider::findOrFail($id);
        $slide->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Hero slaytı silindi.',
        ]);
    }
}


