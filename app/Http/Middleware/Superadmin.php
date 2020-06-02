<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;


class Superadmin
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
 
       $role = $request->user()->role()->get();

       if (!$role=='1'){
           return redirect('/unauthorized');
       }

        return $next($request);
    }
}
