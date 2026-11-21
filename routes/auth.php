<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])
            ->name('login');

        Route::post('/login', [AuthController::class, 'login'])
            ->middleware('throttle:5,1')
            ->name('login.post');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');
    });
});