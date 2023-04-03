<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
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

            // Admin management access
            "admin_manage_access",
            "admin_manage_add",
            "admin_manage_edit",
            "admin_manage_delete",
            "admin_manage_view",
        ];

        foreach($permissions as $permission){
            Permission::create([
                "name"=>$permission,
                "guard_name"=>"admin"
            ]);
        }
    }
}
