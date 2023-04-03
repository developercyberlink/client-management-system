<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create super admin role
        $super_admin_role = Role::create(['name'=>'Super Admin', "guard_name"=>"admin"]);

        // Add super admin role to existing admin
        $id = 3;

        $admin = Admin::find($id);
        $admin->assignRole('Super Admin');
    }
}
