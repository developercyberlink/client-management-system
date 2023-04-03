<?php

namespace App\Http\Controllers;

use App\Models\ColorSize;
use Illuminate\Http\Request;

class ColorSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('color_size_access');
        $colorsizes = ColorSize::all();

        return view('admin.color_size.index', ["colorsizes"=>$colorsizes]);
    }

    public function add(){
        $this->authorize('color_size_add');
        return view('admin.color_size.add');
    }

    public function create(Request $request){
        $this->authorize('color_size_add');
        $request->validate([
            'name'=>"required|unique:color_sizes,name",
            'type'=>'required',
        ]);

        $color_size = new ColorSize([
            "name"=>$request->get('name'),
            "type"=>$request->get('type')
        ]);

        $color_size->save();

        return redirect()->route('admin.colorsize.index');
    }

    public function edit($name){
        $this->authorize('color_size_edit');
        $colorsize = ColorSize::where('name', $name)->first();

        return view('admin.color_size.edit', ["colorsize" => $colorsize]);
    }

    public function update(Request $request){
        $this->authorize('color_size_edit');
        $request->validate([
            "name"=>"required|unique:color_sizes,name,".$request->get("id"),
            "type"=>"required"
        ]);

        $colorsize = ColorSize::find($request->get("id"));
        $colorsize->name = $request->get("name");
        $colorsize->type = $request->get("type");

        $colorsize->save();

        return redirect()->route('admin.colorsize.index');
    }

    public function delete($name){
        $this->authorize('color_size_delete');
        $colorsize = ColorSize::where('name', $name)->first();
        $colorsize->delete();

        return redirect()->route('admin.colorsize.index');
    }
}
