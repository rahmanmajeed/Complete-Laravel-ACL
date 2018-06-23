<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;


class AppController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function userList()
    {
        $users=User::with('roles','user_permissions')->get();
        return view('user',compact('users'));
    }
    public function roleList()
    {
        $roles=Role::with('role_permissions')->get();
        return view('role',compact('roles'));
        
    }
    public function permissionList()
    {
        $permissions=Permission::all();
        return view('permission',compact('permissions'));
        
    }
}
