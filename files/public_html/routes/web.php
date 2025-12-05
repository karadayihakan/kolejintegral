<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PanelController;
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
})->middleware('role:admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/{slug}')->name('branch.')->group(function () {
  Route::get('/', [BranchMainController::class, 'index'])->name('index');

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