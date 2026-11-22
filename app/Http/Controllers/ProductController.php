<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fase UTS: Data produk statis dikelola di kode sebelum migrasi ke MySQL pada UAS
        $products = [
            // Daftar array produk statis kamu di sini
        ];

        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        return view('products.show', compact('slug'));
    }
}