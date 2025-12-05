<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;

class PageViewController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $settings = Setting::getByGroup('contact') ?? [];
        $socialSettings = Setting::getByGroup('social') ?? [];

        return view('page', [
            'page' => $page,
            'settings' => $settings,
            'socialSettings' => $socialSettings,
        ]);
    }

    public function showBySlug(string $slug)
    {
        // Önce sayfa var mı kontrol et
        $page = Page::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$page) {
            abort(404);
        }

        $settings = Setting::getByGroup('contact') ?? [];
        $socialSettings = Setting::getByGroup('social') ?? [];

        return view('page', [
            'page' => $page,
            'settings' => $settings,
            'socialSettings' => $socialSettings,
        ]);
    }

    public function showDynamic(string $slug)
    {
        // Cache ile sayfa kontrolü yap (10 dakika cache)
        $page = \Illuminate\Support\Facades\Cache::remember("page_slug_{$slug}", 600, function () use ($slug) {
            return Page::where('slug', $slug)
                ->where('is_active', true)
                ->first();
        });
        
        if ($page) {
            return $this->show($slug);
        }
        
        // Sayfa yoksa branch kontrolüne geç (cache ile)
        $branch = \Illuminate\Support\Facades\Cache::remember("branch_slug_{$slug}", 600, function () use ($slug) {
            return \App\Models\Branch::where('slug', $slug)->first();
        });
        
        if ($branch) {
            return app(\App\Http\Controllers\BranchMainController::class)->index($slug);
        }
        
        // Hiçbiri yoksa 404
        abort(404);
    }
}

