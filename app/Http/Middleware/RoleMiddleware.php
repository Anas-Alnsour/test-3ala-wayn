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

    $userRole = strtolower(trim($request->user()->role));
    $currentPath = $request->getPathInfo();

    if (! in_array($userRole, $roles)) {
        // تحديد المسار المستهدف بناءً على الرتبة
        $targetPath = match ($userRole) {
            'admin'      => '/admin/dashboard',
            'local'      => '/local/dashboard',
            'restaurant' => '/restaurant/dashboard',
            'hotel'      => '/hotel/dashboard',
            'assistant'  => '/assistant/dashboard',
            default      => '/tourist/dashboard',
        };

        // منع إعادة التوجيه إذا كان المستخدم واقفاً بالفعل على المسار الصحيح
        if ($currentPath === $targetPath) {
            return $next($request);
        }

        return redirect($targetPath);
    }

    return $next($request);
}
}
