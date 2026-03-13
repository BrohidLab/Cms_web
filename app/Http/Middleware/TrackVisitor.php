<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Analytic;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    	if ($request->is('user-admin*')) {
    	        return $next($request);
    	    }
    	Analytic::create([
    	        'url' => $request->fullUrl(),
    	        'page' => $request->path(),
    	        'ip_address' => $request->ip(),
    	        'user_agent' => $request->userAgent(),
    	    ]);
        return $next($request);
    }
}
