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
    	    
    	    $userAgent = substr(request()->userAgent(), 0, 255);
    	    $cleanUrl = request()->url();
    	    
    	Analytic::create([
    	        'url' => $cleanUrl,
    	        'page' => $request->path(),
    	        'ip_address' => $request->ip(),
    	        'user_agent' => $userAgent,
    	    ]);
        return $next($request);
    }
}
