<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->isAdmin === 1){
            return $next($request);
        }elseif (auth()->user()->isAdmin === 2){
            return $next($request);
        }else{
            return redirect('home')->with('error',"You don't have admin access.");
        }
    }
}
