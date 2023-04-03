<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;

class ServiceTypeController extends Controller
{
   public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        
        $data = ServiceType::all();

        return view('admin.service-type.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            "title"=>"required|unique:service_types,title",
        ]);

        ServiceType::create([
            "title"=>$request->title,
        ]);

        return redirect()->route('admin.service-type.index')->with('message','Created Successfully.');
    }

    public function edit($id){
        $data = ServiceType::find($id);

        return view('admin.service-type.edit', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            "title"=>"required|unique:service_types,title,".$request->id,
        ]);

        $data = ServiceType::find($request->id);
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.service-type.index')->with('message','Updated Successfully.');
    }

    public function destroy($id)
    {
       $data = ServiceType::find($id);      
       $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }
}
