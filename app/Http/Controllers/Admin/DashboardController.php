<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use App\Models\VisitorLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Basic statistics that don't rely on visitor_logs
            $totalArticles = Article::count();
            $totalUsers = User::count();
            $totalViews = Article::sum('view_count');
            
            // Recent articles
            $recentArticles = Article::with('user')
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
            
            // For visitor logs, we'll use a safer approach - just count total records
            // This avoids column-specific errors
            $todayVisitors = 0;
            $weeklyVisitorsData = [0, 0, 0, 0, 0, 0, 0];
            $weekDays = [];
            
            // Only try to count visitors if the table exists
            if (Schema::hasTable('visitor_logs')) {
                $todayVisitors = DB::table('visitor_logs')
                    ->whereDate('created_at', Carbon::today())
                    ->count();
                
                // Set up weekdays
                $startOfWeek = Carbon::now()->startOfWeek();
                for ($i = 0; $i < 7; $i++) {
                    $date = (clone $startOfWeek)->addDays($i);
                    $weekDays[] = $date->locale('id')->shortDayName;
                    
                    $count = DB::table('visitor_logs')
                        ->whereDate('created_at', $date)
                        ->count();
                    
                    $weeklyVisitorsData[$i] = $count;
                }
            } else {
                $weekDays = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
            }

            // Category data for pie chart
            $categoryData = Article::select('category', DB::raw('count(*) as total'))
                ->groupBy('category')
                ->get();
            
            $categoryNames = $categoryData->pluck('category')->map(function($category) {
                return ucfirst($category);
            })->toArray();
            
            $categoryCounts = $categoryData->pluck('total')->toArray();

            // If no categories, provide default
            if (empty($categoryNames)) {
                $categoryNames = ['Tidak Ada Kategori'];
                $categoryCounts = [0];
            }

            return view('admin.app.dashboard', compact(
                'totalArticles',
                'totalUsers',
                'totalViews',
                'todayVisitors',
                'recentArticles',
                'weeklyVisitorsData',
                'weekDays',
                'categoryNames',
                'categoryCounts'
            ));
        } catch (\Exception $e) {
            // Provide default values in case of error
            return view('admin.app.dashboard', [
                'error' => 'Terjadi kesalahan saat memuat data: ' . $e->getMessage(),
                'totalArticles' => Article::count(),
                'totalUsers' => User::count(),
                'totalViews' => Article::sum('view_count'),
                'todayVisitors' => 0,
                'recentArticles' => Article::with('user')->orderBy('created_at', 'desc')->limit(5)->get(),
                'weeklyVisitorsData' => [0, 0, 0, 0, 0, 0, 0],
                'weekDays' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                'categoryNames' => ['Tidak Ada Kategori'],
                'categoryCounts' => [0]
            ]);
        }
    }
} 