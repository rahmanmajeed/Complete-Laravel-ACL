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
        $this->middleware('HasPermission:Role-Update,Role-Delete')->only('userEdit');
        $this->middleware('HasRole:Admin|Author')->except(['userEdit','roleEdit','permissionEdit','userUpdate']);
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


    public function userEdit($id)
    {
        $user=User::with('roles','user_permissions')->findOrFail($id);
        $roles=Role::all();
        $permissions=Permission::all();
        return view('update-pages.user_edit',compact('user','roles','permissions'));
    }

    public function roleEdit($id)
    {
        $role=Role::with('role_permissions')->findOrFail($id);

        return view('update-pages.role_update',compact('role'));        
    }
    public function permissionEdit($id)
    {
        return $id;        
    }
/**
 * 
 * Create new Role 
 */
   public function roleFrom()
   {
       $permissions=Permission::all();
       return view('create-pages.role',compact('permissions'));
   }

   public function storeRole(Request $request)
   {
       $this->validate($request,[
           'name' => 'required',
           'slug' => 'required|unique:roles',
           'desp' => 'required'
       ],[
           'name.required'=>'Enter Role Name',
           'slug.required'=>'Enter Role Slug',
           'slug.unique' =>'Slug must be Unique',
           'desp.required'=>'Enter Role Description',
       ]);

       $role= new Role;
       $role->name=$request->name;
       $role->slug=ucfirst($request->slug);
       $role->description=$request->desp;
       $role->save();

       foreach($request['permission'] as $permission)
        {
          $role->role_permissions()->attach(Permission::where('id',$permission)->first());
        }

       return redirect()->route('role.list')->with('status','Role Created Successfully !!!');
   }


/**
 * 
 * Update User based on Role Permissions.
 */
    public function userUpdate(Request $request,$id)
    {
        /**Detach or Remove User previous Role */
        $user=User::where('id',$id)->first();
        $user->roles()->detach();
        $user->user_permissions()->detach();

        if(is_array($request['role']))
        {
            foreach($request['role'] as $role)
            {
               $user->roles()->attach(Role::where('id',$role)->first());
               $role=Role::with('role_permissions')->where('id',$role)->first();
            
              foreach ($role->role_permissions as $permission) 
              {
                if (! $user->user_permissions()->sync($permission,false)) 
                {
                    $user->user_permissions()->attach($permission);
                }
                    
              }
            }

            
        }

         return redirect()->route('user.list');
        
    }
}
