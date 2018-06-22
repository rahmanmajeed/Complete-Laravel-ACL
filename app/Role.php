<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Permission;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class,'user_role');
    }

    public function role_permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permission');
    }
}
