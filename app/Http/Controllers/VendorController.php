<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('vendor_access');
        $vendors = Vendor::all();

        return view('admin.vendor.index', ["vendors"=>$vendors]);
    }

    public function add(){
        $this->authorize('vendor_add');

        return view('admin.vendor.add');
    }

    public function create(Request $request){
        $this->authorize('vendor_add');
        $request->validate([
            "name"=>"required",
            "pan"=>"required|unique:vendors,pan"
        ]);

        Vendor::create([
            'name'=>$request->get("name"),
            'pan'=>$request->get("pan")
        ]);

        return redirect()->route('admin.vendor.index');
    }

    public function createImmediate(Request $request){
        $this->authorize('vendor_add');

        $validator = Validator::make($request->all(), [
            "name"=>"required",
            "pan"=>"required|unique:vendors,pan"
        ]);

        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors()->all()
            ]);
        }

        $vendor = Vendor::create([
            'name'=>$request->get("name"),
            'pan'=>$request->get("pan")
        ]);

        return response()->json([
            "success"=>["Vendor successfully added !!"],
            "id"=>[$vendor->id]
        ]);
    }

    public function edit($pan){
        $this->authorize('vendor_edit');
        $vendor = Vendor::where('pan', $pan)->first();

        return view('admin.vendor.edit', ['vendor'=>$vendor]);
    }

    public function update(Request $request){
        $this->authorize('vendor_edit');

        $vendor = Vendor::find($request->get("id"));

        $request->validate([
            "name"=>"required",
            "pan"=>"required|numeric|unique:vendors,pan,".$vendor->id
        ]);

        $vendor->name = $request->get("name");
        $vendor->pan = $request->get("pan");
        $vendor->save();

        return redirect()->route('admin.vendor.index');
    }

    public function delete($pan){
        $this->authorize('vendor_delete');
        $vendor = Vendor::where('pan', $pan)->first();

        $vendor->delete();

        return redirect()->route('admin.vendor.index');
    }

}
