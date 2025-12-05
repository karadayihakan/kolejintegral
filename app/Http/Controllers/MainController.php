<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\News;
use App\Models\Setting;
use App\Models\Gallery;
use App\Models\HeroSlider;
use App\Models\Menu;
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
      
      // Tüm birimleri dinamik olarak çek (veritabanından)
      // Ana sayfa birimleri - tamamen dinamik (veritabanındaki tüm birimler)
      // Sıralama: order alanına göre, yoksa isme göre
      $homepageUnits = Branch::orderBy('order', 'asc')->orderBy('name', 'asc')->get();

      // Hero slider slaytları
      $heroSliders = HeroSlider::active()->ordered()->get();

      // Galeri görselleri (varsa)
      $galleries = Gallery::active()->ordered()->get();

      // Genel menü öğeleri (branch_id null)
      $menus = Menu::active()->general()->ordered()->get();

      return view('welcome', compact(
          'branches',
          'news',
          'allNews',
          'settings',
          'socialSettings',
          'mapSettings',
          'galleries',
          'homepageUnits',
          'heroSliders',
          'menus'
      ));
    }

}
