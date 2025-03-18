<?php

namespace App\Http\Middleware;

use App\Models\VisitorLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!$request->ajax() && $request->method() === 'GET') {
            $this->logVisit($request);
        }

        return $response;
    }

    private function logVisit(Request $request)
    {
        try {
            $articleId = null;
            $route = $request->route();

            // Cek apakah halaman yang dikunjungi adalah halaman artikel
            if ($route && $route->getName() === 'artikel.view') {
                $articleId = $route->parameter('id');
            }

            // Simpan log kunjungan
            VisitorLog::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'article_id' => $articleId,
                'user_id' => auth()->id(),
                'page_visited' => $request->fullUrl(),
                'referrer' => $request->header('referer'),
                // Untuk data geografis bisa menggunakan layanan pihak ketiga seperti geoip
            ]);
        } catch (\Exception $e) {
            // Log error tanpa menghentikan request
            \Log::error('Error tracking visitor: ' . $e->getMessage());
        }
    }
} 