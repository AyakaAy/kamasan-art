<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrackingController;

// Halaman Informasi Publik (HomeController)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/galeri', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::view('/tracking', 'tracking.index')->name('tracking');

// login admin
Route::view('/admin/login', 'admin.login')->name('admin.login');

// Halaman Katalog & Detail Produk (ProductController)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Halaman Lacak Pesanan (TrackingController)
Route::get('/tracking', [TrackingController::class, 'index'])
    ->middleware('throttle:20,1')
    ->name('tracking.index');

// Halaman detail hasil pelacakan (menghilangkan error Route [tracking.show] not defined)
Route::get('/tracking/detail', [TrackingController::class, 'show'])
    ->middleware('throttle:20,1')
    ->name('tracking.show');

// home
Route::get('/home', function () {
    return view('home');
});

// katalog produk
Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

// detail produk
Route::get('/products/{slug}', function (string $slug) {
    return view('products.show', ['slug' => $slug]);
})->name('products.show');

// form login admin
Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

// lacak pesanan
Route::get('/tracking', function () {
    return view('tracking.index');
})->name('tracking.index');


// tetapkan paling bawah ini di akhir file routes/web.php
require __DIR__.'/auth.php';