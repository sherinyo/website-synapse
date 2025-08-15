<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Periksa apakah pengguna sudah login.
        if (!Auth::check()) {
            // Jika belum, arahkan ke halaman login.
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2. Periksa apakah peran pengguna cocok.
        // strtolower() digunakan untuk memastikan perbandingan tidak sensitif terhadap huruf besar/kecil.
        if (strtolower(Auth::user()->role) !== strtolower($role)) {
            // Jika tidak cocok, kembalikan response 403 Forbidden.
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // 3. Jika otorisasi berhasil, lanjutkan ke request berikutnya.
        return $next($request);
    }
}
