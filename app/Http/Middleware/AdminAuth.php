<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$isAuthenticatedAdmin = (Auth::check() && Auth::user()->admin == 1);
		if (!$isAuthenticatedAdmin)
			return redirect('/login')->with('message', 'Para acceder al sitio solicitado es necesario ingresar como administrador de empresa.');
		return $next($request);
	}
}
