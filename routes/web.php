<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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







// tetapkan paling bawah ini di akhir file routes/web.php
require __DIR__.'/auth.php';