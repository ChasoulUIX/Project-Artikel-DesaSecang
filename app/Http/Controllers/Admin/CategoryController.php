<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = [
            'berita', 'budaya', 'khutbah', 'doa', 
            'kerukunan', 'pendidikan', 'politik', 'populer'
        ];
        
        $selectedCategory = $request->category;
        
        $query = Article::with('user')->latest();
        
        if ($selectedCategory) {
            if ($selectedCategory == 'populer') {
                $query = Article::with('user')->orderBy('view_count', 'desc');
            } else {
                $query = $query->where('category', $selectedCategory);
            }
        }
        
        $articles = $query->get();
        
        return view('admin.categories.index', compact('articles', 'categories', 'selectedCategory'));
    }
}
