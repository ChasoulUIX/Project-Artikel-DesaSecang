<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

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
    return view('user.pages.artikel/*  */');
});

Route::get('/images/{filename}', function($filename) {
    $path = public_path('images/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.app.dashboard');
    })->name('admin.app.dashboard');
});

