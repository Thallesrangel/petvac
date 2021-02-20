<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Autenticado
{
    public function handle($request, Closure $next)
    {
        
        if (!session('usuario')) {
   
            return redirect()->route('login');
        }
        // Permite o acesso, continua a requisição
        return $next($request);
    }
}