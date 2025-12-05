<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Package;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Menu;
use Illuminate\Http\Request;

class BranchMainController extends Controller
{
    public function index($slug) {
        $branch = Branch::where('slug', $slug)->first();

        if (!$branch) {
            return to_route('home');
        }

        $packages = Package::where('branch_id', $branch->id)
            ->with('features')
            ->get();

        // Galeri: genel (branch_id null) + ilgili birime ait olanlar
        $galleries = Gallery::active()
            ->where(function ($q) use ($branch) {
                $q->whereNull('branch_id')
                  ->orWhere('branch_id', $branch->id);
            })
            ->ordered()
            ->get();

        // Haberler: genel (branch_id null) + ilgili birime ait olanlar (ilk 3)
        $news = News::with(['category', 'branch'])
            ->where(function ($q) use ($branch) {
                $q->whereNull('branch_id')
                  ->orWhere('branch_id', $branch->id);
            })
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // Birim menüsü: hem genel menüler hem de birim menüleri (Birimler hariç)
        $menus = Menu::active()
            ->where(function ($q) use ($branch) {
                $q->whereNull('branch_id')  // Genel menüler
                  ->orWhere('branch_id', $branch->id);  // Birim menüleri
            })
            ->where(function ($q) {
                // Birimler menüsünü hariç tut
                $q->where('url', '!=', '#classes')
                  ->where('url', 'not like', '%birimler%')
                  ->where('url', 'not like', '%classes%')
                  ->where('label', '!=', 'Birimler')
                  ->where('label', 'not like', '%Birimler%');
            })
            ->ordered()
            ->get();

        return view('branch.welcome', compact('branch', 'slug', 'packages', 'galleries', 'news', 'menus'));
    }
}
