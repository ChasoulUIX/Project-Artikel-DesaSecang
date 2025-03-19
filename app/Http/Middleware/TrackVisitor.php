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
        
        // Only track GET requests that are not admin or api routes
        if ($request->isMethod('GET') && 
            !$request->is('admin/*') && 
            !$request->is('api/*')) {
            
            try {
                // Get the article ID if viewing an article
                $articleId = null;
                $route = $request->route();
                if ($route && $route->getName() == 'articles.show' && $route->hasParameter('article')) {
                    $articleId = $route->parameter('article');
                }

                // Log the visit
                VisitorLog::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'article_id' => $articleId,
                    'url' => $request->fullUrl(),
                    'session_id' => $request->session()->getId(),
                ]);
            } catch (\Exception $e) {
                // Just log the error but don't interrupt the user
                \Log::error('Visitor tracking error: ' . $e->getMessage());
            }
        }
        
        return $response;
    }
} 