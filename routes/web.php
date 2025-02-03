<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.app.dashboard');
});

Route::get('/berita', function () {
    return view('user.pages.berita');
});

Route::get('/budaya', function () {
    return view('user.pages.budaya');
});

Route::get('/khutbah', function () {
    return view('user.pages.khutbah');
});

Route::get('/doa', function () {
    return view('user.pages.doa');
});

Route::get('/kerukunan', function () {
    return view('user.pages.kerukunan');
});

Route::get('/pendidikan', function () {
    return view('user.pages.pendidikan');
});

Route::get('/politik', function () {
    return view('user.pages.politik');
});

Route::get('/populer', function () {
    return view('user.pages.populer');
});

Route::get('/tentangkami', function () {
    return view('user.pages.tentangkami');
});

Route::get('/hubungikami', function () {
    return view('user.pages.hubungikami');
});

Route::get('/artikel', function () {
    return view('user.pages.artikel');
});
