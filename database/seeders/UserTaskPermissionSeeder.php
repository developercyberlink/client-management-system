<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTaskPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            // Category related permissions
            "user_task_access",
            "user_task_delete",
            "user_task_forward",
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission, "guard_name"=>"admin"]);
        }

        $superadmin_role = Role::where('name', 'Super Admin')->first();
        $admin_role = Role::where('name', 'Admin')->first();

        foreach($permissions as $permission){
            $superadmin_role->givePermissionTo($permission);
            $admin_role->givePermissionTo($permission);
        }
    }
}
