<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Check if user role is in the allowed roles for this route
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk halaman ini.');
    }
}
