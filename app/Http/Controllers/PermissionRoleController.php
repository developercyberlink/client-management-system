<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function modifyPermission(Request $request){
        //$this->authorize('admin_manage_access');

        $role = Role::where('name', $request->get('name'))->first();

        return response()->json([
            "success"=>[$role->name]
        ]);
    }
}
