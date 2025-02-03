<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.app.dashboard');
});

Route::get('/berita', function () {
    return view('user.pages.berita');
});

Route::get('/kategori', function () {
    return view('user.pages.category');
});
