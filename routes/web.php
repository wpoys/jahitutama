<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;

// Public pages routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/galeri/kategori/{kategori}', [PageController::class, 'galeriByKategori'])->name('galeri.kategori');
Route::get('/harga', [PageController::class, 'harga'])->name('harga');
Route::get('/cara-order', [PageController::class, 'caraOrder'])->name('cara-order');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/order', [OrderController::class, 'show'])->name('order.show');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success/{id}', [OrderController::class, 'success'])->name('order.success');

// Admin Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/admin/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
});

// Admin Protected routes
Route::middleware('auth')->group(function () {
    // Admin Dashboard
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')
        ->middleware('admin');

    // Admin Orders Management
    Route::prefix('admin/orders')->middleware('admin')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::put('/{id}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
    });

    // Admin Galleries Management
    Route::prefix('admin/galleries')->middleware('admin')->group(function () {
        Route::get('/', [AdminGalleryController::class, 'index'])->name('admin.galleries.index');
        Route::get('/create', [AdminGalleryController::class, 'create'])->name('admin.galleries.create');
        Route::post('/', [AdminGalleryController::class, 'store'])->name('admin.galleries.store');
        Route::get('/{id}', [AdminGalleryController::class, 'show'])->name('admin.galleries.show');
        Route::get('/{id}/edit', [AdminGalleryController::class, 'edit'])->name('admin.galleries.edit');
        Route::put('/{id}', [AdminGalleryController::class, 'update'])->name('admin.galleries.update');
        Route::delete('/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.galleries.destroy');
    });

    // Admin Logout
    Route::post('/admin/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
