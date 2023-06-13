<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = Service::all();

        return view('admin.service.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            "title"=>"required|unique:services,title",
        ]);

        Service::create([
            "title"=>$request->title,
        ]);

        return redirect()->route('admin.service.index')->with('message','Created Successfully.');
    }

    public function edit($id){
        $data = Service::find($id);

        return view('admin.service.edit', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            "title"=>"required|unique:services,title,".$request->id,
        ]);

        $data = Service::find($request->id);
        $data->title = $request->title;
        $data->show_programming = $request->show_programming;
        $data->show_service = $request->show_service;
        $data->save();

        return redirect()->route('admin.service.index')->with('message','Updated Successfully.');
    }

    public function destroy($id)
    {
       $data = Service::find($id);
       $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }
}
