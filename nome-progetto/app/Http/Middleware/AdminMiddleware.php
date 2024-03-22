<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Se l'utente non è un amministratore, reindirizzalo altrove o nega l'accesso
        return redirect()->route('home')->with('error', 'Accesso negato. Solo gli amministratori possono accedere a questa pagina.');
    }
}

