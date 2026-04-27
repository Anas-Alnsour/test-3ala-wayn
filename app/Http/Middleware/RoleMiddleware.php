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
            switch ($role) {
                case 'admin': return redirect('/admin/dashboard');
                case 'local': return redirect('/local/dashboard');
                case 'restaurant': return redirect('/restaurant/dashboard');
                case 'hotel': return redirect('/hotel/dashboard');
                case 'assistant': return redirect('/assistant/dashboard');
                default: return redirect('/tourist/dashboard');
            }
        }

        return $next($request);
    }
}
