<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\AdminBankDetails;
use App\Models\AdminDocuments;
use Image;

class AdminManagementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('admin_manage_access');
        $admins = Admin::orderBy('id','desc')->get();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.adminmanage.index', [
            "admins"=>$admins, 
            "roles"=>$roles,
            "permissions"=>$permissions
        ]);
    }

    public function modifyPermission(Request $request){
        
        $this->authorize('admin_manage_edit');

        $role = Role::where('name', $request->get('role'))->first();

        if($request->get('checked')=="true"){
            $role->givePermissionTo($request->get('permission'));
        }else{
            $role->revokePermissionTo($request->get('permission'));
        }

        return response()->json([
            "success"=>["Role has been updated"]
        ]);
    }

    public function add(){
        $this->authorize('admin_manage_add');
        $roles = Role::all();

        return view('admin.adminmanage.add', ["roles"=>$roles]);
    }

    public function register(Request $request){       

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>['required'],
            'mobile'=>['required','string', 'max:10'],
        ]);
         $name = '';
        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');         
            $name = time() . '.' . $image->getClientOriginalExtension();             
            $destinationPath = public_path('/uploads/admin-image');  
            $image->move($destinationPath, $name);            
        }

        $admin = Admin::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'mobile' => $request->get('mobile'),
            'dob' => $request->get('dob'),
            'date_join' => $request->get('date_join'),
            'gender' => $request->get('gender'),
            'department' => $request->get('department'),
            'designation' => $request->get('designation'),     
            'image' => $name,      
        ]);

        $admin->assignRole($request->get('role'));

        return redirect()->route('admin.adminmanage.index')->with('message','Successfully added.');
    }

    public function view($id){

        $this->authorize('admin_manage_view');       

        $admin = Admin::where('id', $id)->first();
        $bank = AdminBankDetails::where('admin_id',$admin->id)->first();
        $documents = AdminDocuments::where('admin_id',$admin->id)->get();
        return view('admin.adminmanage.view', ["admin"=>$admin,"bank"=>$bank,"documents"=>$documents]);
    }

    public function edit($id){
        $this->authorize('admin_manage_edit');
        $roles = Role::all();

        $admin = Admin::where('id', $id)->first();

        return view('admin.adminmanage.edit', ["roles"=>$roles, "admin"=>$admin]);
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:admins,email,'.$request->get('id')],
            // 'role'=>['required'],
            'mobile'=>['required','string', 'max:10'],
        ]);
         //upload image
        $admin = Admin::find($request->get("id"));
        if ($request->hasFile('image')) {             
            if($admin->image){
                if(file_exists('uploads/admin-image/' . $admin->image)){
                    unlink('uploads/admin-image/' . $admin->image);
                }               
            }
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/admin-image/');
            $image->move($destinationPath, $name);
            $admin['image'] = $name;
        }               
        $admin->name = $request->get("name");
        $admin->email = $request->get("email");
        $admin->mobile = $request->get("mobile");
        $admin->dob = $request->get("dob");
        $admin->date_join = $request->get("date_join");
        $admin->gender = $request->get("gender");
        $admin->designation = $request->get("designation");
        $admin->department = $request->get("department");
        $admin->status = $request->get("status");
        $admin->syncRoles($request->get('role'));

        if($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $admin->password = Hash::make($request->get('password'));
        }

        $admin->save();
        return redirect()->back()->with('message','Updated Successfully.');
    }

    public function destroy($id){
    $data = Admin::find($id);
      if($data->image != NULL){
         if(file_exists(env('PUBLIC_PATH').'uploads/admin-image/' . $data->image)){
            unlink(env('PUBLIC_PATH').'uploads/admin-image/' . $data->image);
          }
      }
       $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }


}
