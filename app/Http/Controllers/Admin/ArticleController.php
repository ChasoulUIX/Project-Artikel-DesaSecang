<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['berita', 'budaya', 'khutbah', 'doa', 'kerukunan', 'pendidikan', 'politik', 'populer'];
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'user_id' => auth()->id(),
            'category' => $request->category,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = ['berita', 'budaya', 'khutbah', 'doa', 'kerukunan', 'pendidikan', 'politik', 'populer'];
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($article->image) {
                $oldImagePath = public_path('images/' . $article->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            $imagePath = public_path('images/' . $article->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
    }

    // Tambahkan method baru untuk menampilkan artikel di halaman publik
    public function viewArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->incrementViewCount();
        
        return view('user.pages.article-detail', compact('article'));
    }

    // Method untuk halaman kategori
    public function categoryBerita()
    {
        $articles = Article::where('category', 'berita')->latest()->get();
        $categoryName = 'Berita';
        
        return view('user.pages.berita', compact('articles', 'categoryName'));
    }

    /**
     * Display articles from the budaya category
     * 
     * @return \Illuminate\View\View
     */
    public function categoryBudaya()
    {
        // Mengambil artikel dengan kategori 'budaya'
        $articles = Article::where('category', 'budaya')->latest()->get();
        
        // Siapkan kategori name
        $categoryName = 'Budaya';
        
        // Jika tidak ada artikel dalam kategori ini, tampilkan pesan
        if ($articles->isEmpty()) {
            return view('user.pages.budaya', compact('articles', 'categoryName'));
        }
        
        // Artikel populer dari semua kategori
        $popularArticlesAll = Article::orderBy('view_count', 'desc')->take(5)->get();
        
        // Artikel pilihan editor (bisa dari kategori lain untuk variasi)
        $editorPicks = Article::where('category', '!=', 'budaya')
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Tampilkan view dengan data yang sudah diambil
        return view('user.pages.budaya', compact(
            'articles', 
            'categoryName', 
            'popularArticlesAll',
            'editorPicks'
        ));
    }

    /**
     * Display articles from the khutbah category
     * 
     * @return \Illuminate\View\View
     */
    public function categoryKhutbah()
    {
        // Mengambil artikel dengan kategori 'khutbah'
        $articles = Article::where('category', 'khutbah')->latest()->get();
        
        // Siapkan kategori name
        $categoryName = 'Khutbah';
        
        // Jika tidak ada artikel dalam kategori ini, tampilkan pesan
        if ($articles->isEmpty()) {
            return view('user.pages.khutbah', compact('articles', 'categoryName'));
        }
        
        // Artikel populer dari semua kategori
        $popularArticlesAll = Article::orderBy('view_count', 'desc')->take(5)->get();
        
        // Artikel pilihan editor (bisa dari kategori lain untuk variasi)
        $editorPicks = Article::where('category', '!=', 'khutbah')
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Tampilkan view dengan data yang sudah diambil
        return view('user.pages.khutbah', compact(
            'articles', 
            'categoryName', 
            'popularArticlesAll',
            'editorPicks'
        ));
    }

    /**
     * Display articles from the doa category
     * 
     * @return \Illuminate\View\View
     */
    public function categoryDoa()
    {
        // Mengambil artikel dengan kategori 'doa'
        $articles = Article::where('category', 'doa')->latest()->get();
        
        // Siapkan kategori name
        $categoryName = 'Doa';
        
        // Jika tidak ada artikel dalam kategori ini, tampilkan pesan
        if ($articles->isEmpty()) {
            return view('user.pages.doa', compact('articles', 'categoryName'));
        }
        
        // Artikel populer dari semua kategori
        $popularArticlesAll = Article::orderBy('view_count', 'desc')->take(5)->get();
        
        // Artikel pilihan editor (bisa dari kategori lain untuk variasi)
        $editorPicks = Article::where('category', '!=', 'doa')
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Tampilkan view dengan data yang sudah diambil
        return view('user.pages.doa', compact(
            'articles', 
            'categoryName', 
            'popularArticlesAll',
            'editorPicks'
        ));
    }

    /**
     * Display articles from the kerukunan category
     * 
     * @return \Illuminate\View\View
     */
    public function categoryKerukunan()
    {
        // Mengambil artikel dengan kategori 'kerukunan'
        $articles = Article::where('category', 'kerukunan')->latest()->get();
        
        // Siapkan kategori name
        $categoryName = 'Kerukunan';
        
        // Jika tidak ada artikel dalam kategori ini, tampilkan pesan
        if ($articles->isEmpty()) {
            return view('user.pages.kerukunan', compact('articles', 'categoryName'));
        }
        
        // Artikel populer dari semua kategori
        $popularArticlesAll = Article::orderBy('view_count', 'desc')->take(5)->get();
        
        // Artikel pilihan editor (bisa dari kategori lain untuk variasi)
        $editorPicks = Article::where('category', '!=', 'kerukunan')
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Tampilkan view dengan data yang sudah diambil
        return view('user.pages.kerukunan', compact(
            'articles', 
            'categoryName', 
            'popularArticlesAll',
            'editorPicks'
        ));
    }

    public function categoryPendidikan()
    {
        // Mengambil artikel dengan kategori 'pendidikan'
        $articles = Article::where('category', 'pendidikan')->latest()->get();
        
        // Siapkan kategori name
        $categoryName = 'Pendidikan';
        
        // Jika tidak ada artikel dalam kategori ini, lewatkan artikel populer dan editor picks
        if ($articles->isEmpty()) {
            return view('user.pages.pendidikan', compact('articles', 'categoryName'));
        }
        
        // Tambahan: Ambil artikel populer dari semua kategori
        $popularArticlesAll = Article::orderBy('view_count', 'desc')->take(5)->get();
        
        // Artikel terbaru dari semua kategori sebagai pilihan editor
        $editorPicks = Article::where('category', '!=', 'pendidikan')
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Tampilkan view dengan data yang sudah diambil
        return view('user.pages.pendidikan', compact(
            'articles', 
            'categoryName', 
            'popularArticlesAll',
            'editorPicks'
        ));
    }

    /**
     * Display articles from the politik category
     * 
     * @return \Illuminate\View\View
     */
    public function categoryPolitik()
    {
        // Mengambil artikel dengan kategori 'politik'
        $articles = Article::where('category', 'politik')->latest()->get();
        
        // Siapkan kategori name
        $categoryName = 'Politik';
        
        // Jika tidak ada artikel dalam kategori ini, tampilkan pesan
        if ($articles->isEmpty()) {
            return view('user.pages.politik', compact('articles', 'categoryName'));
        }
        
        // Artikel populer dari semua kategori
        $popularArticlesAll = Article::orderBy('view_count', 'desc')->take(5)->get();
        
        // Artikel pilihan editor (bisa dari kategori lain untuk variasi)
        $editorPicks = Article::where('category', '!=', 'politik')
                            ->latest()
                            ->take(5)
                            ->get();
        
        // Tampilkan view dengan data yang sudah diambil
        return view('user.pages.politik', compact(
            'articles', 
            'categoryName', 
            'popularArticlesAll',
            'editorPicks'
        ));
    }

    public function categoryPopuler()
    {
        $articles = Article::orderBy('view_count', 'desc')->take(10)->get();
        $categoryName = 'Artikel Populer';
        return view('user.pages.populer', compact('articles', 'categoryName'));
    }

    /**
     * Get articles by category
     * 
     * @param string $category
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getArticlesByCategory($category, $limit = 10)
    {
        return Article::where('category', $category)
                ->latest()
                ->take($limit)
                ->get();
    }

    /**
     * Get popular articles
     * 
     * @param string|null $category
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getPopularArticles($category = null, $limit = 5)
    {
        $query = Article::orderBy('view_count', 'desc');
        
        if ($category) {
            $query->where('category', $category);
        }
        
        return $query->take($limit)->get();
    }

    /**
     * Get latest articles
     * 
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getLatestArticles($limit = 5)
    {
        return Article::latest()->take($limit)->get();
    }

    /**
     * Displays a category page with articles
     * 
     * @param Request $request
     * @param string $categorySlug
     * @return \Illuminate\View\View
     */
    public function showCategory($category)
    {
        // Special handling for 'populer' category
        if ($category === 'populer') {
            return $this->popularArticles();
        }
        
        // Map category names
        $categories = [
            'politik' => ['db' => 'politik', 'name' => 'Politik'],
            'pendidikan' => ['db' => 'pendidikan', 'name' => 'Pendidikan'],
            'kerukunan' => ['db' => 'kerukunan', 'name' => 'Kerukunan'],
            'budaya' => ['db' => 'budaya', 'name' => 'Budaya'],
            'berita' => ['db' => 'berita', 'name' => 'Berita'],
            'khutbah' => ['db' => 'khutbah', 'name' => 'Khutbah'],
            'doa' => ['db' => 'doa', 'name' => 'Doa']
        ];
        
        // Check if category exists
        if (!isset($categories[$category])) {
            return redirect()->route('home')->with('error', 'Kategori tidak ditemukan');
        }
        
        $dbCategory = $categories[$category]['db'];
        $categoryName = $categories[$category]['name'];
        
        try {
            // Get articles for this category
            $articles = Article::where('category', $dbCategory)
                                ->latest()
                                ->get();
            
            // If no articles found, return early with empty data
            if ($articles->isEmpty()) {
                return view("user.pages.{$category}", [
                    'articles' => $articles,
                    'categoryName' => $categoryName,
                ]);
            }
            
            // Get popular articles from all categories
            $popularArticlesAll = Article::orderBy('view_count', 'desc')
                                        ->take(5)
                                        ->get();
            
            // Get editor's picks (from different categories for variety)
            $editorPicks = Article::where('category', '!=', $dbCategory)
                                ->latest()
                                ->take(5)
                                ->get();
            
            // Return the view with all data
            return view("user.pages.{$category}", compact(
                'articles',
                'categoryName',
                'popularArticlesAll',
                'editorPicks'
            ));
            
        } catch (\Exception $e) {
            // Log the error
            \Log::error("Error displaying {$category} page: " . $e->getMessage());
            
            // Return view with error message
            return view("user.pages.{$category}", [
                'articles' => collect(),  // Empty collection
                'categoryName' => $categoryName,
                'error' => 'Terjadi kesalahan saat memuat data. Silakan coba lagi nanti.'
            ]);
        }
    }

    /**
     * Display most popular articles
     * 
     * @return \Illuminate\View\View
     */
    public function popularArticles()
    {
        // Ambil artikel populer berdasarkan view_count
        $articles = Article::orderBy('view_count', 'desc')->take(20)->get();
        
        return view('user.pages.populer', [
            'articles' => $articles,
            'pageTitle' => 'Artikel Terpopuler',
            'editorPicks' => Article::latest()->take(5)->get()
        ]);
    }
}
