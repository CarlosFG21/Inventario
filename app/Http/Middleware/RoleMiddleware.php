<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login'); // Redirige al login si no está autenticado
        }

        // Verifica si el usuario tiene uno de los roles permitidos
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección.'); // 403 Forbidden
        }

        return $next($request);
    }
}

