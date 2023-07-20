<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MuridAuthorizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil id murid dari URL atau dari form request sesuai kebutuhan.
        $muridId = $request->route('muridId');

        // Jika user adalah admin atau pemilik data, beri izin untuk mengakses.
        if (auth()->user()->role === 'admin' || auth()->user()->id === $muridId) {
            return $next($request);
        }

        // Jika bukan admin atau pemilik data, tampilkan pesan akses ditolak atau redirect ke halaman tertentu.
        return response('Unauthorized.', 403);
    }
}