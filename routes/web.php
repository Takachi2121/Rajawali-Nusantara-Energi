<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){
    Route::prefix('/')->middleware('guest')->group(function(){
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('/visimisi', [PageController::class, 'visimisi'])->name('visimisi');
        Route::get('/legalitas', [PageController::class, 'legalitas'])->name('legalitas');
        Route::get('/harga', [PageController::class, 'harga'])->name('harga');
        Route::get('/galery', [PageController::class, 'galery'])->name('galery');
        Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    });
});
