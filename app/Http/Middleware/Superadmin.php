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
       // dd($request);
       //dd(Role::where('name', 'admin')->get()[0]->name);
       $roles = $request->user()->roles()->get();
       $validRole = false;

       foreach ($roles as $rol)
        {
            if($rol->name == 'superadmin'){
                $validRole = true;
            }
        }

        if (!$validRole){
            return redirect('/');
        }

        return $next($request);
    }
}
