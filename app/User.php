<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_role');
    }

    public function user_permissions()
    {
        return $this->belongsToMany(Permission::class,'user_permission');
    }

    /**
     * User Role's Check methods
     */

     public function hasPermission(string $permission)
     {
        if($this->user_permissions()->where('name',$permission)->first())
        {
            return true;
        }
        return false;
     }

     //============ Role ==============//
     public function hasAnyRole($roles)
     {
         if(is_array($roles))
         {
             foreach($roles as $role)
             {
                 if($this->hasRole($role))
                 {
                     return true;
                 }

             }
         }
         else
         {
             if($this->hasRole($roles))
             {
                 return true;
             }
         }
         return false;
     }

     public function hasRole($role)
     {
         if($this->roles()->where('slug',$role)->first())
         {
             return true;
         }
         return false;

     }
     
}
