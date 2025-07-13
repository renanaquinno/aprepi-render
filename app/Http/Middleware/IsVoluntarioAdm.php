<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVoluntarioAdm
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->tipo_usuario == 'voluntario_adm' || auth()->user()->tipo_usuario == 'admin')) {
            return $next($request);
        }


        abort(403, 'Acesso negado. Somente voluntários administrativos.');
    }
}
