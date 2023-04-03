<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ModeratorRoleSeeder extends Seeder
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
        $moderator_role = Role::create(['name'=>'Moderator', "guard_name"=>"admin"]);

        // Admin role permissions
        $permissions=[
            // Category related permissions
            "category_access",

            // Sub Category related permissions
            "sub_category_access",

            // Product related permissions
            "product_access",

            // Color Size related permissions
            "color_size_access",
        ];

        // Add permission to created role
        foreach($permissions as $permission){
            $moderator_role->givePermissionTo($permission);
        }
    }
}
