<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! $request->user()) {
            return redirect('/login');
        }

        if (! in_array($request->user()->role, $roles)) {
            // Redirect based on actual role if they don't have permission
            $role = $request->user()->role;
            if ($role === 'admin') return redirect('/admin/dashboard');
            if ($role === 'local') return redirect('/local/dashboard');
            return redirect('/tourist/dashboard');
        }

        return $next($request);
    }
}
