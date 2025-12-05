<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        $news = News::with(['category', 'branch'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $settings = Setting::getByGroup('contact') ?? [];
        $socialSettings = Setting::getByGroup('social') ?? [];

        return view('news.index', compact('news', 'settings', 'socialSettings'));
    }

    /**
     * Birime göre haber listesi.
     */
    public function branchIndex(string $slug)
    {
        $news = News::with(['category', 'branch'])
            ->where(function ($q) use ($slug) {
                // Genel haberler (branch_id null)
                $q->whereNull('branch_id')
                  // veya ilgili şubeye ait haberler
                  ->orWhereHas('branch', function ($q2) use ($slug) {
                      $q2->where('slug', $slug);
                  });
            })
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $settings = Setting::getByGroup('contact') ?? [];
        $socialSettings = Setting::getByGroup('social') ?? [];

        return view('news.index', compact('news', 'settings', 'socialSettings'));
    }

    /**
     * Display the specified news.
     */
    public function show(News $news)
    {
        $news->load(['category', 'branch']);

        // Eğer haber yayınlanmamışsa veya gelecekte yayınlanacaksa 404 döndür
        if (!$news->published_at || $news->published_at > now()) {
            abort(404);
        }

        // Settings'leri al (varsa)
        $settings = Setting::getByGroup('contact') ?? [];
        $socialSettings = Setting::getByGroup('social') ?? [];

        return view('news.show', compact('news', 'settings', 'socialSettings'));
    }
}
