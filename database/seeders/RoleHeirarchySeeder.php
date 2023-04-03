<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\RoleHierarchy;

class RoleHeirarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::where('name', 'Super Admin')->first();
        $admin = Role::where('name', 'Admin')->first();
        $editor = Role::where('name', 'Editor')->first();
        $moderator = Role::where('name', 'Moderator')->first();

        RoleHierarchy::create([
            'role_id'=>$superadmin->id,
            'parent_id'=>0,
        ]);

        RoleHierarchy::create([
            'role_id'=>$admin->id,
            'parent_id'=>$superadmin->id,
        ]);

        RoleHierarchy::create([
            'role_id'=>$editor->id,
            'parent_id'=>$admin->id,
        ]);

        RoleHierarchy::create([
            'role_id'=>$moderator->id,
            'parent_id'=>$editor->id,
        ]);
    }
}
