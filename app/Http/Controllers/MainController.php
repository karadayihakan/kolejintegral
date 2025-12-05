<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\News;
use App\Models\Setting;
use App\Models\Gallery;
use App\Models\HeroSlider;
use App\Models\Menu;
use App\Models\PopupBanner;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
      $branches = Branch::all();
      // Ana sayfa için 3 haber
      $news = News::with(['category', 'branch'])
          ->whereNotNull('published_at')
          ->where('published_at', '<=', now())
          ->orderBy('published_at', 'desc')
          ->take(3)
          ->get();
      
      // Modal için tüm haberler (6 adet)
      $allNews = News::with(['category', 'branch'])
          ->whereNotNull('published_at')
          ->where('published_at', '<=', now())
          ->orderBy('published_at', 'desc')
          ->take(6)
          ->get();

      // Settings'leri al (varsa)
      $settings = Setting::getByGroup('contact') ?? [];
      $socialSettings = Setting::getByGroup('social') ?? [];
      $mapSettings = Setting::getByGroup('map') ?? [];
      
      // Yerleşkeleri type'a göre ayır
      $ilkogretimBranch = Branch::where(function($q) {
          $q->where('type', 'ilkogretim')->orWhere('type', 'ilkokul');
      })->first();
      $liseBranch = Branch::where(function($q) {
          $q->where('type', 'lise')->orWhere('type', 'fen-anadolu-lisesi');
      })->first();

      // Okul kademelerine göre branch'leri eşleştir (geriye dönük uyumluluk için)
      $anaSinifiBranch = Branch::where('type', 'okul-oncesi')->orWhere('type', 'ana-sinifi')->first();
      $ilkokulBranch = Branch::where('type', 'ilkokul')->first();
      $ortaokulBranch = Branch::where('type', 'ortaokul')->first();
      $anadoluLisesiBranch = Branch::where('type', 'anadolu-lisesi')->orWhere('type', 'lise')->first();
      $fenLisesiBranch = Branch::where('type', 'fen-lisesi')->orWhere('type', 'fen-anadolu-lisesi')->first();

      // Ana sayfa birimleri - type'a göre sıralı
      $homepageUnits = Branch::whereIn('type', ['okul-oncesi', 'ilkokul', 'ortaokul', 'anadolu-lisesi', 'fen-lisesi'])
          ->orderByRaw("CASE 
              WHEN type = 'okul-oncesi' THEN 1
              WHEN type = 'ilkokul' THEN 2
              WHEN type = 'ortaokul' THEN 3
              WHEN type = 'anadolu-lisesi' THEN 4
              WHEN type = 'fen-lisesi' THEN 5
              ELSE 6
          END")
          ->get();

      // Hero slider slaytları
      $heroSliders = HeroSlider::active()->ordered()->get();

      // Galeri görselleri (varsa)
      $galleries = Gallery::active()->ordered()->get();

      // Genel menü öğeleri (branch_id null)
      $menus = Menu::active()->general()->ordered()->get();

      // Aktif popup banner
      $popupBanner = PopupBanner::active()->first();

      return view('welcome', compact(
          'branches',
          'news',
          'allNews',
          'settings',
          'socialSettings',
          'mapSettings',
          'ilkogretimBranch',
          'liseBranch',
          'galleries',
          'anaSinifiBranch',
          'ilkokulBranch',
          'ortaokulBranch',
          'anadoluLisesiBranch',
          'fenLisesiBranch',
          'homepageUnits',
          'heroSliders',
          'menus',
          'popupBanner'
      ));
    }

}
