<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PanelAuthController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

// Frontend route
Route::get('/', [FrontendController::class, 'home']);

// Admin panel authentication
Route::get('/panel/login', [PanelAuthController::class, 'loginForm'])->name('panel.login'); // FIXED
Route::post('/panel/login', [PanelAuthController::class, 'login'])->name('panel.login.submit');
Route::post('/panel/logout', [PanelAuthController::class, 'logout'])->name('panel.logout');


// Dashboard (protected)
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Protected routes (middleware: panelauth)
Route::middleware(['panelauth'])->group(function () {

    // Banners
    Route::prefix('backend/banner')->name('backend.banner.')->group(function () {
        Route::get('/index', [BannerController::class, 'index'])->name('index');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/store', [BannerController::class, 'store'])->name('store');
        Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('edit');
        Route::put('/update/{banner}', [BannerController::class, 'update'])->name('update');
        Route::delete('/delete/{banner}', [BannerController::class, 'destroy'])->name('destroy');
    });

    // Services
    Route::prefix('backend/service')->name('backend.service.')->group(function () {
        Route::get('/index', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/edit/{service}', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/update/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/delete/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    // Portfolios
    Route::prefix('backend/portfolio')->name('backend.portfolios.')->group(function () {
        Route::get('/index', [PortfolioController::class, 'index'])->name('index');
        Route::get('/create', [PortfolioController::class, 'create'])->name('create');
        Route::post('/store', [PortfolioController::class, 'store'])->name('store');
        Route::get('/edit/{portfolio}', [PortfolioController::class, 'edit'])->name('edit');
        Route::put('/update/{portfolio}', [PortfolioController::class, 'update'])->name('update');
        Route::delete('/delete/{portfolio}', [PortfolioController::class, 'destroy'])->name('destroy');
    });

    // About section
    Route::prefix('admin')->name('backend.')->group(function () {
        Route::resource('abouts', AboutController::class);
    });

    // Admin dashboard view
    Route::view('/backend/admin/dashboard', 'backend.admin.dashboard')->name('backend.admin.dashboard');
});
