<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function permission_users()
    {
        return $this->belongsToMany(User::class,'user_permission');
    }

    public function permission_roles()
    {
        return $this->belongsToMany(Role::class,'role_permission');
    }
}
