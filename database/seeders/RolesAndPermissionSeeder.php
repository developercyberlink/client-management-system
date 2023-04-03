<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            "user_manage_access",
            "user_manage_create",
            "user_manage_edit",
            "user_manage_delete",
        ];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission, "guard_name"=>"admin"]);
        }

        $super_admin_role = Role::create(['name'=>'Super Admin', "guard_name"=>"admin"]);

        foreach($permissions as $permission){
            $super_admin_role->givePermissionTo($permission);
        }
    }
}
