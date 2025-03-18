<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserTrafficController;

Route::get('/', function () {
    try {
        // Artikel terbaru untuk banner slider (3 artikel terbaru)
        $sliderArticles = App\Models\Article::latest()->take(3)->get();
        
        // Artikel untuk kolom kiri, tengah, dan kanan
        $leftColumnArticles = App\Models\Article::where('category', 'berita')->latest()->take(3)->get();
        $rightColumnArticles = App\Models\Article::where('category', 'khutbah')->latest()->take(3)->get();
        
        // Artikel per kategori
        $beritaArticles = App\Models\Article::where('category', 'berita')->latest()->take(3)->get();
        $budayaArticles = App\Models\Article::where('category', 'budaya')->latest()->take(3)->get();
        $khutbahArticles = App\Models\Article::where('category', 'khutbah')->latest()->take(3)->get();
        
        // Artikel populer
        $popularArticles = App\Models\Article::orderBy('view_count', 'desc')->take(6)->get();
        
        // Artikel utama
        $featuredArticle = App\Models\Article::orderBy('view_count', 'desc')->first();
        
        // Artikel pendamping
        $sideArticles = App\Models\Article::where('id', '!=', $featuredArticle ? $featuredArticle->id : 0)
                         ->latest()
                         ->take(2)
                         ->get();
        
        // Kategori
        $categories = ['berita', 'budaya', 'khutbah', 'doa', 'kerukunan', 'pendidikan', 'politik', 'populer'];
        
        // Tambahkan semua variabel ke array data
        $data = compact(
            'sliderArticles', 
            'leftColumnArticles',
            'rightColumnArticles',
            'beritaArticles', 
            'budayaArticles', 
            'khutbahArticles', 
            'popularArticles',
            'featuredArticle',
            'sideArticles',
            'categories'
        );
        
        return view('user.app.dashboard', $data);
    } catch (\Exception $e) {
        // Log error jika terjadi masalah
        \Log::error('Error on homepage: ' . $e->getMessage());
        
        // Tampilkan halaman dengan data minimal
        return view('user.app.dashboard', [
            'error' => 'Terjadi kesalahan saat memuat data. Silakan coba lagi nanti.'
        ]);
    }
})->name('home');

Route::get('/berita', function () {
    $articles = App\Models\Article::where('category', 'berita')->latest()->get();
    return view('user.pages.berita', compact('articles'));
})->name('kategori.berita');

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
    
    // Routes untuk manajemen artikel
    Route::resource('articles', ArticleController::class);
    
    // Route untuk manajemen kategori
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
    
    Route::get('/admin/user-traffic', [UserTrafficController::class, 'index'])->name('user.traffic');
    
    // Route untuk manajemen artikel kategori pendidikan
    Route::get('/admin/kategori/pendidikan', function() {
        $articles = App\Models\Article::where('category', 'pendidikan')->latest()->paginate(10);
        return view('admin.kategori.pendidikan', compact('articles'));
    })->name('admin.kategori.pendidikan');
    
    // Route untuk tambah artikel kategori pendidikan
    Route::get('/admin/kategori/pendidikan/create', function() {
        return view('admin.articles.create', ['defaultCategory' => 'pendidikan']);
    })->name('admin.kategori.pendidikan.create');
});

// Routes untuk kategori artikel di halaman user
Route::get('/berita', [App\Http\Controllers\Admin\ArticleController::class, 'categoryBerita'])->name('kategori.berita');
Route::get('/budaya', [App\Http\Controllers\Admin\ArticleController::class, 'categoryBudaya'])->name('kategori.budaya');
Route::get('/khutbah', [App\Http\Controllers\Admin\ArticleController::class, 'categoryKhutbah'])->name('kategori.khutbah');
Route::get('/doa', [App\Http\Controllers\Admin\ArticleController::class, 'categoryDoa'])->name('kategori.doa');
Route::get('/kerukunan', [App\Http\Controllers\Admin\ArticleController::class, 'categoryKerukunan'])->name('kategori.kerukunan');
Route::get('/pendidikan', [App\Http\Controllers\Admin\ArticleController::class, 'categoryPendidikan'])->name('kategori.pendidikan');
Route::get('/politik', [App\Http\Controllers\Admin\ArticleController::class, 'categoryPolitik'])->name('kategori.politik');
Route::get('/populer', [App\Http\Controllers\Admin\ArticleController::class, 'popularArticles'])->name('kategori.populer');

// Route untuk detail artikel
Route::get('/artikel/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'viewArticle'])->name('artikel.view');

// Dynamic route for all category pages
Route::get('/{category}', [App\Http\Controllers\Admin\ArticleController::class, 'showCategory'])
    ->name('kategori.show')
    ->where('category', 'politik|pendidikan|kerukunan|budaya|berita|khutbah|doa|populer');

