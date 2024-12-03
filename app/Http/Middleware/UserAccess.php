<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string $userType
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        // Pastikan pengguna telah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Periksa jenis user (type) apakah cocok
        if (auth()->user()->type == $userType) {
            return $next($request);
        }

        // Redirect jika akses tidak diizinkan
        return redirect()->route('not-found')
            ->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
