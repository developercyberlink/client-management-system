<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminRoleSeeder extends Seeder
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
        $admin_role = Role::create(['name'=>'Admin', "guard_name"=>"admin"]);

        // Admin role permissions
        $permissions=[
            // Category related permissions
            "category_access",
            "category_add",
            "category_edit",
            "category_delete",

            // Sub Category related permissions
            "sub_category_access",
            "sub_category_add",
            "sub_category_edit",
            "sub_category_delete",

            // Product related permissions
            "product_access",
            "product_add",
            "product_edit",
            "product_delete",
            "product_manage",

            // Color Size related permissions
            "color_size_access",
            "color_size_add",
            "color_size_edit",
            "color_size_delete",
        ];

        // Add permission to created role
        foreach($permissions as $permission){
            $admin_role->givePermissionTo($permission);
        }

        // Add super admin role to existing admin
        $id = 1;

        $admin = Admin::find($id);
        $admin->assignRole('Admin');
    }
}
