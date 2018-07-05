<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$permissions)
    {
        // $permissions = explode(',', $permissions);
        //dd($permissions);
    
        foreach($permissions as $permission){
            if(!Auth::user()->hasPermission($permission)){
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
