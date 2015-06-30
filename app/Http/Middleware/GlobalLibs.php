<?php namespace App\Http\Middleware;

use Closure;

class GlobalLibs {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        include_once("libs/php/helper.php");

		return $next($request);
	}

}
