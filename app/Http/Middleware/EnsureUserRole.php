<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect ke halaman default sesuai role
            $redirectTo = match (Auth::user()->role ?? null) {
                'kreator' => '/home-creator',
                'supporter' => '/home-supporter',
                default => '/login',
            };
            return redirect($redirectTo);
        }

        return $next($request);
    }
}
