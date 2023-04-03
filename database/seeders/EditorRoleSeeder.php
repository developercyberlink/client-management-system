<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class EditorRoleSeeder extends Seeder
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
        $editor_role = Role::create(['name'=>'Editor', "guard_name"=>"admin"]);

        // Admin role permissions
        $permissions=[
            // Category related permissions
            "category_access",
            "category_edit",

            // Sub Category related permissions
            "sub_category_access",
            "sub_category_edit",

            // Product related permissions
            "product_access",
            "product_edit",
            "product_manage",

            // Color Size related permissions
            "color_size_access",
            "color_size_edit",
        ];

        // Add permission to created role
        foreach($permissions as $permission){
            $editor_role->givePermissionTo($permission);
        }
    }
}
