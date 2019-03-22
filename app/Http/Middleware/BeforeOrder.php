<?php
namespace App\Http\Middleware;
use Closure;

class BeforeOrder
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
        //Your logic goes here

        return $next($request);
    }
}
