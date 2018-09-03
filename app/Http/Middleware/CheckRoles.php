<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){

		/*obtiene todos los parametros que se le envian a la funcion*/
		
		$roles = array_slice(func_get_args(), 2);

		//revisa en el arreglo
		if (auth()->user()->hasRoles($roles)){
			return $next($request);
		}
	
		return redirect('/');
		
	}
}
