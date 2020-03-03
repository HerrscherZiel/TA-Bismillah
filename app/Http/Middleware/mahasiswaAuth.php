<?php

namespace App\Http\Middleware;

use Closure;

class mahasiswaAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="mahasiswa")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('mahasiswa.login'));
        }
        return $next($request);
    }
}
