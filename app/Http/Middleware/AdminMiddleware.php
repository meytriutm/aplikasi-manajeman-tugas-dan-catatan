<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    // Hanya mengizinkan pengguna dengan role admin
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->isAdmin()) {
            return response()->json([
                'message' => 'Akses ditolak. Hanya admin yang boleh mengakses.',
            ], 403);
        }

        return $next($request);
    }
}