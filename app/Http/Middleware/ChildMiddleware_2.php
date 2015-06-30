<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Router;
use Symfony\Component\HttpKernel\Tests\Fragment\RoutableFragmentRendererTest;
use Symfony\Component\Routing\Annotation\Route;

class ChildMiddleware_2 {

    protected $router;
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
        echo " child_2 middleware";
        //echo $router->currentRouteName();
        return $next($request);
	}

}
