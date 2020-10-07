<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{

    public function handle($request, Closure $next, $role)
    {

        if(!Auth::user()){
            return redirect('login');

        }

        if (Auth::user()->role == $role){
            return $next($request);
            
        }else{
            return redirect('/');

        }

    }
}


