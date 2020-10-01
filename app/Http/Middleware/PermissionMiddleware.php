<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     */
    public function handle($request, Closure $next, $role)
    {
       
        if (Auth::user()->role == $role){
            return $next($request);
            
        }else{
            return redirect('/');

        }

    }
}


