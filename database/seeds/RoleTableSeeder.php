<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_create =Permission::where('name','Role-Create')->first();
        $permission_read   =Permission::where('name','Role-Read')->first();
        $permission_update =Permission::where('name','Role-Update')->first();
        $permission_delete =Permission::where('name','Role-Delete')->first();


        $role_user=new Role();
        $role_user->name="User";
        $role_user->slug="User";
        $role_user->description="This is an User";
        $role_user->save();

        //attach permission to role.
        $role_user->role_permissions()->attach($permission_read);
        
        $role_author=new Role();
        $role_author->name="Author";
        $role_author->slug="Author";
        $role_author->description="This is an Author";
        $role_author->save();

        $role_author->role_permissions()->attach($permission_read);
        $role_author->role_permissions()->attach($permission_update);


        $role_admin=new Role();
        $role_admin->name="Admin";
        $role_admin->slug="Admin";
        $role_admin->description="This is an Admin";
        $role_admin->save();

        $role_admin->role_permissions()->attach($permission_create);
        $role_admin->role_permissions()->attach($permission_read);
        $role_admin->role_permissions()->attach($permission_update);
        $role_admin->role_permissions()->attach($permission_delete);

       
    }
}
