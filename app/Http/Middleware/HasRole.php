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
       //$str_role=explode('|',current($role));
       /**current() function take array first element as a string like as $role[0] */
       $str_role=explode('|',$role[0]);
       $roleString=$str_role;
    
         $roles=is_array($role)? $role : is_array($roleString)? $roleString : null;
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
