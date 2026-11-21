<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/products/{slug}', function (string $slug) {
    return view('products.show', ['slug' => $slug]);
})->name('products.show');
