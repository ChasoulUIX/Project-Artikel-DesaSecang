<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // Default data
        $data = [
            'totalArticles' => 0,
            'totalUsers' => 0,
            'totalViews' => 0,
            'todayVisitors' => 0,
            'weeklyVisitorsData' => [0, 0, 0, 0, 0, 0, 0],
            'weekDays' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            'categoryNames' => ['Tidak Ada Kategori'],
            'categoryCounts' => [1],
            'recentArticles' => collect(),
        ];
        
        try {
            // Actual data retrieval here...
            if (Schema::hasTable('articles')) {
                $data['totalArticles'] = Article::count();
                $data['totalViews'] = Article::sum('view_count');
                $data['recentArticles'] = Article::with('user')
                                        ->latest()
                                        ->take(10)
                                        ->get();
                
                // Get category statistics
                $categoryData = Article::select('category', DB::raw('count(*) as total'))
                                ->groupBy('category')
                                ->orderBy('total', 'desc')
                                ->get();
                
                if ($categoryData->isNotEmpty()) {
                    $data['categoryNames'] = $categoryData->pluck('category')
                                        ->map(function($item) {
                                            return ucfirst($item);
                                        })->toArray();
                    $data['categoryCounts'] = $categoryData->pluck('total')->toArray();
                }
            }
            
            // Get user statistics
            if (Schema::hasTable('users')) {
                $data['totalUsers'] = User::count();
            }
            
            $popularArticles = Article::orderBy('view_count', 'desc')
                                     ->take(6)
                                     ->get();
            
            // Return view dengan data yang telah disiapkan
            return view('user.app.dashboard', compact('data', 'popularArticles'));
            
        } catch (\Exception $e) {
            \Log::error('Dashboard error: ' . $e->getMessage());
            $data['error'] = 'Terjadi kesalahan saat memuat data dashboard.';
            return view('user.app.dashboard', $data);
        }
    }
} 