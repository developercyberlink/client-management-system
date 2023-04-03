<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgrammingType;

class ProgrammingTypeController extends Controller
{
   public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        
        $data = ProgrammingType::all();

        return view('admin.programming-type.index', compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            "title"=>"required|unique:programming_types,title",
        ]);

        ProgrammingType::create([
            "title"=>$request->title,
        ]);

        return redirect()->route('admin.programming-type.index')->with('message','Created Successfully.');
    }

    public function edit($id){
        $data = ProgrammingType::find($id);

        return view('admin.programming-type.edit', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            "title"=>"required|unique:programming_types,title,".$request->id,
        ]);

        $data = ProgrammingType::find($request->id);
        $data->title = $request->title;
        $data->save();

        return redirect()->route('admin.programming-type.index')->with('message','Updated Successfully.');
    }

    public function destroy($id)
    {
       $data = ProgrammingType::find($id);      
       $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }
}
