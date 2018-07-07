<?php

namespace App\Http\Middleware;

use Closure;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$role)
    {
        // return is_array($roles)? $roles: explode('|', $roles);
       // $roles=is_array($role)? $role: explode('|', $role);
       $str_role=explode('|',$role[0]);
       $rolem=$str_role;
    
         $roles=is_array($role)? $role : is_array($rolem)? $rolem : null;
         //dd($roles);

        if($request->user()===null)
        {
            return response('Insufficient Access',401);
        }

        if($request->user()->hasAnyRole($roles) || !$roles)
        {
             return $next($request);
        }
          return response('Insufficient Permission',401);
        //return $next($request);
    }
}
