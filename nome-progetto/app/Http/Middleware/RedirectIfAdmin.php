<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
