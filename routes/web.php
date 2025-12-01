<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){
    Route::get('/', function () {
        return view('page-main.main');
    })->name('home');

    Route::get('/visimisi', function () {
        return view('page-submain.visi');
    })->name('visimisi');

    Route::get('/legalitas', function () {
        return view('page-submain.legalitas');
    })->name('legalitas');

    Route::get('/harga', function () {
        return view('page-submain.harga');
    })->name('harga');

    Route::get('/galery', function () {
        return view('page-submain.galeryFull');
    })->name('galery');

    Route::get('/contact', function () {
        return view('page-submain.kontak');
    })->name('contact');
});
