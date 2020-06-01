<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;

class IsUser
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
       $roles = $request->user()->roles()->get();
       $validRole = false;

       foreach ($roles as $rol)
        {
            if($rol->name == 'user'){
                $validRole = true;
            }
        }
        
        if (!$validRole){
            return redirect('/unauthorized');
        }
       
        return $next($request);
    }
}
