<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user belum login
        if (!Auth::check()) {

            // Jika request bukan ajax / json
            if (!$request->expectsJson()) {
                return redirect('/user-admin');
            }

            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        return $next($request);
    }
}