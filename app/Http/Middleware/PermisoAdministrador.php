<?php

namespace App\Http\Middleware;

use Closure;

class PermisoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permisos())
        return $next($request);
        return redirect('/')->with('mensaje', 'No tiene permiso para acceder aquí');
    }

    private function permisos()
    {
        return session()->get('rol_nombre') == 'administrador';
    }

}
