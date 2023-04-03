<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PurchaseBillSeeder extends Seeder
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
            "purchase_bill_access",
            "purchase_bill_add",
            "purchase_bill_edit",
            "purchase_bill_delete",
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
