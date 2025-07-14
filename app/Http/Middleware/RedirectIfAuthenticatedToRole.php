<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedToRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'kreator') {
                return redirect('/home-creator');
            } elseif ($role === 'supporter') {
                return redirect('/home-supporter');
            }
        }

        return $next($request);
    }
}
