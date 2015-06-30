<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Router;
use Symfony\Component\HttpKernel\Tests\Fragment\RoutableFragmentRendererTest;
use Symfony\Component\Routing\Annotation\Route;

class NewMiddleware {

    public function __construct(){

    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        echo "child middleware";
        return $next($request);
	}

}
