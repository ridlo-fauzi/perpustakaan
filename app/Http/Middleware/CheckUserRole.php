<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna telah login
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Memeriksa peran pengguna
            if ($userRole === 'member' && $request->is('products') || $request->is('user')) {
                return redirect('/member'); // Ganti '/home' dengan URL yang sesuai
            }
            // Memeriksa peran pengguna
            if ($userRole === 'staff' && $request->is('member')) {
                return redirect('/products'); // Ganti '/home' dengan URL yang sesuai
            }
        }

        return $next($request);
    }
}
