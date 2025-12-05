<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PageViewController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PopupBannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BranchController as AdminBranchController;
use App\Http\Controllers\BranchMainController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BranchAdminController;
use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CheckIsBranchAdmin;
use App\Http\Middleware\CheckIsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::post('/form-submit', [FormController::class, 'submit'])->name('form.submit');

// Haberler Route'ları
Route::get('/haberler', [NewsController::class, 'index'])->name('news.index');
Route::get('/haberler/{news:slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/{slug}/haberler', [NewsController::class, 'branchIndex'])->name('branch.news.index');

// Statik sayfalar - veritabanından
Route::get('/hakkimizda', [PageViewController::class, 'show'])
    ->defaults('slug', 'hakkimizda')
    ->name('about');

Route::get('/kayitol', [PageViewController::class, 'show'])
    ->defaults('slug', 'kayitol')
    ->name('kayitol');

Route::get('/kvkk-aydinlatma-metni', [PageViewController::class, 'show'])
    ->defaults('slug', 'kvkk-aydinlatma-metni')
    ->name('kvkk');

Route::get('/gizlilik-politikasi', [PageViewController::class, 'show'])
    ->defaults('slug', 'gizlilik-politikasi')
    ->name('gizlilik');

Route::get('/sayfa/{slug}', [PageViewController::class, 'show'])->name('pages.show');

// Pikajintegral
Route::get('/pikaj-integral', [\App\Http\Controllers\MagazineController::class, 'index'])->name('magazines.index');

Route::middleware(CheckIsAdmin::class)->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    
    Route::prefix('/branch')->name('branch.')->group(function () {
      // Şube index sayfası   
      Route::get('/', [AdminBranchController::class, 'index'])->name('index');

      // Şube verilerinin Datatables ile alınması
      Route::get('/data', [AdminBranchController::class, 'getBranches'])->name('data');
      
      // Şube oluşturma veya güncelleme işlemi
      Route::post('/', [AdminBranchController::class, 'store'])->name('store');
      
      // Şube düzenleme işlemi (modal için veri çekme)
      Route::get('/{id}/edit', [AdminBranchController::class, 'edit'])->name('edit');
      
      // Şube silme işlemi
      Route::delete('/{id}', [AdminBranchController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/news')->name('news.')->group(function () {
      Route::get('/', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('index');
      Route::get('/data', [\App\Http\Controllers\Admin\NewsController::class, 'getNews'])->name('data');
      Route::post('/', [\App\Http\Controllers\Admin\NewsController::class, 'store'])->name('store');
      Route::get('/{id}/edit', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('edit');
      Route::delete('/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/news-categories')->name('news-categories.')->group(function () {
      Route::get('/', [\App\Http\Controllers\Admin\NewsCategoryController::class, 'index'])->name('index');
      Route::get('/data', [\App\Http\Controllers\Admin\NewsCategoryController::class, 'getCategories'])->name('data');
      Route::post('/', [\App\Http\Controllers\Admin\NewsCategoryController::class, 'store'])->name('store');
      Route::get('/{id}/edit', [\App\Http\Controllers\Admin\NewsCategoryController::class, 'edit'])->name('edit');
      Route::delete('/{id}', [\App\Http\Controllers\Admin\NewsCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/magazines')->name('magazines.')->group(function () {
      Route::get('/', [\App\Http\Controllers\Admin\MagazineController::class, 'index'])->name('index');
      Route::get('/data', [\App\Http\Controllers\Admin\MagazineController::class, 'getMagazines'])->name('data');
      Route::post('/', [\App\Http\Controllers\Admin\MagazineController::class, 'store'])->name('store');
      Route::get('/{id}/edit', [\App\Http\Controllers\Admin\MagazineController::class, 'edit'])->name('edit');
      Route::delete('/{id}', [\App\Http\Controllers\Admin\MagazineController::class, 'destroy'])->name('destroy');
    });

    // Hero Slider
    Route::prefix('/hero-sliders')->name('hero-sliders.')->group(function () {
        Route::get('/', [HeroSliderController::class, 'index'])->name('index');
        Route::get('/data', [HeroSliderController::class, 'data'])->name('data');
        Route::post('/', [HeroSliderController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [HeroSliderController::class, 'edit'])->name('edit');
        Route::delete('/delete/{id}', [HeroSliderController::class, 'destroy'])->name('destroy');
    });

    // Keşfet / Galeri
    Route::prefix('/gallery')->name('gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/data', [GalleryController::class, 'data'])->name('data');
        Route::post('/', [GalleryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [GalleryController::class, 'destroy'])->name('destroy');
    });

    // Menü Yönetimi
    Route::prefix('/menu')->name('menu.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::get('/data', [MenuController::class, 'data'])->name('data');
        Route::post('/', [MenuController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [MenuController::class, 'destroy'])->name('destroy');
    });

    // Popup Banner
    Route::prefix('/popup-banner')->name('popup-banner.')->group(function () {
        Route::get('/', [PopupBannerController::class, 'index'])->name('index');
        Route::get('/data', [PopupBannerController::class, 'data'])->name('data');
        Route::post('/', [PopupBannerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PopupBannerController::class, 'edit'])->name('edit');
        Route::delete('/{id}', [PopupBannerController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/register-pdfs')->name('register-pdfs.')->group(function () {
      Route::get('/', [\App\Http\Controllers\Admin\RegisterPdfController::class, 'index'])->name('index');
      Route::get('/data', [\App\Http\Controllers\Admin\RegisterPdfController::class, 'getPdfs'])->name('data');
      Route::post('/', [\App\Http\Controllers\Admin\RegisterPdfController::class, 'store'])->name('store');
      Route::get('/{id}/edit', [\App\Http\Controllers\Admin\RegisterPdfController::class, 'edit'])->name('edit');
      Route::delete('/{id}', [\App\Http\Controllers\Admin\RegisterPdfController::class, 'destroy'])->name('destroy');
    });

      Route::prefix('/pages')->name('pages.')->group(function () {
      Route::get('/', [\App\Http\Controllers\Admin\PageController::class, 'index'])->name('index');
      Route::get('/data', [\App\Http\Controllers\Admin\PageController::class, 'getPages'])->name('data');
      Route::get('/create', [\App\Http\Controllers\Admin\PageController::class, 'create'])->name('create');
      Route::post('/', [\App\Http\Controllers\Admin\PageController::class, 'store'])->name('store');
      Route::post('/upload', [\App\Http\Controllers\Admin\PageController::class, 'uploadFile'])->name('upload');
      Route::get('/upload', [\App\Http\Controllers\Admin\PageController::class, 'uploadPage'])->name('upload.page');
      Route::get('/{id}/edit', [\App\Http\Controllers\Admin\PageController::class, 'edit'])->name('edit');
      Route::post('/{id}', [\App\Http\Controllers\Admin\PageController::class, 'update'])->name('update');
      Route::delete('/{id}', [\App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('destroy');
      
      // Section routes
      Route::post('/{pageId}/sections', [\App\Http\Controllers\Admin\PageController::class, 'storeSection'])->name('sections.store');
      Route::get('/{pageId}/sections/{sectionId}/edit', [\App\Http\Controllers\Admin\PageController::class, 'editSection'])->name('sections.edit');
      Route::post('/{pageId}/sections/{sectionId}', [\App\Http\Controllers\Admin\PageController::class, 'updateSection'])->name('sections.update');
      Route::put('/{pageId}/sections/{sectionId}', [\App\Http\Controllers\Admin\PageController::class, 'updateSection'])->name('sections.update');
      Route::delete('/{pageId}/sections/{sectionId}', [\App\Http\Controllers\Admin\PageController::class, 'destroySection'])->name('sections.destroy');
    });
})->middleware('role:admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Dinamik route: Önce sayfa kontrolü, yoksa branch kontrolü
// Bu route tüm yeni sayfalar için otomatik çalışır
Route::get('/{slug}', [\App\Http\Controllers\PageViewController::class, 'showDynamic'])
    ->where('slug', '^(?!haberler|pikaj-integral|hakkimizda|kayitol|kvkk-aydinlatma-metni|gizlilik-politikasi|sayfa|dashboard|profile|auth).*$')
    ->name('dynamic.page.or.branch');

// Branch alt route'ları (dashboard, haberler vb.)
// Ana branch sayfası dinamik route'da kontrol ediliyor
Route::prefix('/{slug}')->name('branch.')->group(function () {
  Route::middleware(CheckIsBranchAdmin::class)->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [BranchAdminController::class, 'index'])->name('index');

    Route::resource('packages', PackageController::class);
    Route::get('packages-data', [PackageController::class, 'getData'])->name('package.data');
    Route::delete('package-feature/{id}', [PackageController::class, 'deleteFeature'])->name('package.feature.destroy');

    Route::prefix('/materials')->name('material.')->group(function () {
        Route::get('/', [MaterialController::class, 'index'])->name('index');
        Route::get('/data', [MaterialController::class, 'getData'])->name('data');
        Route::post('/store', [MaterialController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('edit');
        Route::delete('/delete/{id}', [MaterialController::class, 'destroy'])->name('destroy');
    });
  });

  Route::middleware(CheckIsUser::class)->prefix('/panel')->name('panel.')->group(function () {
    Route::get('/', [PanelController::class, 'index'])->name('index');
  });
});

// Admin genel ayarları (site sabitleri)
Route::middleware(CheckIsAdmin::class)->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});