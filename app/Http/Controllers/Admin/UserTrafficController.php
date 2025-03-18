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

class UserTrafficController extends Controller
{
    public function index(Request $request)
    {
        // Data untuk filter periode
        $period = $request->period ?? 'week'; // default: week
        
        // Periode waktu
        $endDate = Carbon::now();
        
        switch ($period) {
            case 'today':
                $startDate = Carbon::today();
                break;
            case 'yesterday':
                $startDate = Carbon::yesterday();
                $endDate = Carbon::yesterday()->endOfDay();
                break;
            case 'week':
                $startDate = Carbon::now()->subDays(6);
                break;
            case 'month':
                $startDate = Carbon::now()->subDays(29);
                break;
            case 'year':
                $startDate = Carbon::now()->subDays(364);
                break;
            case 'custom':
                $startDate = $request->filled('start_date') ? Carbon::parse($request->start_date) : Carbon::now()->subDays(6);
                $endDate = $request->filled('end_date') ? Carbon::parse($request->end_date)->endOfDay() : Carbon::now();
                break;
            default:
                $startDate = Carbon::now()->subDays(6);
        }
        
        // Periksa kolom yang tersedia
        $columns = Schema::getColumnListing('visitor_logs');
        
        // Total kunjungan dalam periode
        $totalVisits = VisitorLog::whereBetween('created_at', [$startDate, $endDate])->count();
        
        // Jumlah pengunjung unik (berdasarkan IP jika ada)
        $uniqueVisitors = in_array('ip_address', $columns) 
            ? VisitorLog::whereBetween('created_at', [$startDate, $endDate])
                ->distinct('ip_address')
                ->count('ip_address')
            : 0;
        
        // Jumlah kunjungan artikel
        $articleVisits = in_array('article_id', $columns)
            ? VisitorLog::whereBetween('created_at', [$startDate, $endDate])
                ->whereNotNull('article_id')
                ->count()
            : 0;
        
        // Jumlah kunjungan per halaman
        $pageVisits = in_array('page_visited', $columns)
            ? VisitorLog::whereBetween('created_at', [$startDate, $endDate])
                ->select('page_visited', DB::raw('count(*) as total'))
                ->groupBy('page_visited')
                ->orderBy('total', 'desc')
                ->limit(10)
                ->get()
            : collect();
        
        // Artikel paling populer (dummy data jika kolom tidak ada)
        $popularArticles = in_array('article_id', $columns)
            ? Article::withCount(['visitorLogs' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('created_at', [$startDate, $endDate]);
            }])
            ->orderBy('visitor_logs_count', 'desc')
            ->limit(10)
            ->get()
            : Article::orderBy('view_count', 'desc')->limit(10)->get();
        
        // Data untuk grafik kunjungan harian
        $dailyVisits = VisitorLog::whereBetween('created_at', [$startDate, $endDate])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as visits'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        // Pengunjung berdasarkan perangkat
        $deviceStats = in_array('user_agent', $columns)
            ? VisitorLog::whereBetween('created_at', [$startDate, $endDate])
                ->select(DB::raw("
                    CASE 
                        WHEN user_agent LIKE '%Android%' THEN 'Android'
                        WHEN user_agent LIKE '%iPhone%' THEN 'iPhone'
                        WHEN user_agent LIKE '%iPad%' THEN 'iPad'
                        WHEN user_agent LIKE '%Windows%' THEN 'Windows'
                        WHEN user_agent LIKE '%Macintosh%' THEN 'Mac'
                        WHEN user_agent LIKE '%Linux%' THEN 'Linux'
                        ELSE 'Others'
                    END as device
                "), DB::raw('count(*) as total'))
                ->groupBy('device')
                ->orderBy('total', 'desc')
                ->get()
            : collect();
        
        // Halaman terpopuler untuk user yang sudah login
        $loggedInUsers = in_array('user_id', $columns)
            ? VisitorLog::whereBetween('created_at', [$startDate, $endDate])
                ->whereNotNull('user_id')
                ->with('user')
                ->select('user_id', DB::raw('count(*) as visit_count'))
                ->groupBy('user_id')
                ->orderBy('visit_count', 'desc')
                ->limit(10)
                ->get()
            : collect();
        
        // Referrer terbanyak
        $topReferrers = in_array('referrer', $columns)
            ? VisitorLog::whereBetween('created_at', [$startDate, $endDate])
                ->whereNotNull('referrer')
                ->select('referrer', DB::raw('count(*) as total'))
                ->groupBy('referrer')
                ->orderBy('total', 'desc')
                ->limit(10)
                ->get()
            : collect();
        
        return view('admin.traffic.index', compact(
            'totalVisits',
            'uniqueVisitors',
            'articleVisits',
            'pageVisits',
            'popularArticles',
            'dailyVisits',
            'deviceStats',
            'loggedInUsers',
            'topReferrers',
            'period',
            'startDate',
            'endDate'
        ));
    }
} 