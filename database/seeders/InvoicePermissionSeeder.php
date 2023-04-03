<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InvoicePermissionSeeder extends Seeder
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
            "invoice_access",
            "invoice_add",
            "invoice_edit",
            "invoice_delete",
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
