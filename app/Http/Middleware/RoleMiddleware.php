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
     */
    public function handle(Request $request, Closure $next): Response
    {
        // belumpi dipake
        if (Auth::check()) {
            $role = Auth::user()->role;

            // Ganti dengan redirect sesuai role kamu
            if ($role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'user') {
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
