<?php

namespace App\Http\Middleware;

use Closure;

class RedirectUser
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
        if(session()->has('user'))
            {
               return redirect('/');
            }
        else
            {
                return $next($request);
            }
    }
}
