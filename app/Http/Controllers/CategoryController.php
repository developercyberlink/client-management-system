<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $this->authorize('category_access');
        $categories = Category::all();

        return view('admin.category.index', ["categories"=>$categories]);
    }

    public function add(){
        $this->authorize('category_add');

        return view('admin.category.add');
    }

    public function create(Request $request){
        $this->authorize('category_add');

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            'slug'=>'required|unique:contents,slug',
            'cover_image'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors()->all()
            ]);
        }

        $id = ContentController::create($request);

        $category = new Category([
            "content_id"=>$id
        ]);

        $category->save();

        return response()->json([
            "success"=>["Category successfully added !!"]
        ]);
    }

    public function edit($slug){
        $this->authorize('category_edit');
        $category = Content::where('slug', $slug)->first();

        return view('admin.category.edit', ["category" => $category]);
    }

    public function update(Request $request){
        $this->authorize('category_edit');

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'slug'=>'required|unique:contents,slug,'.$request->get('id')
        ]);

        ContentController::update($request, $request->get('id'));

        return redirect()->route('admin.category.index');
    }

    public function delete($slug){
        $this->authorize('category_delete');

        $content = Content::where('slug', $slug)->first();
        $category = Category::where('content_id', $content->id)->first();

        ContentController::delete($content->id);
        $category->delete();

        return response()->json([
            "success"=>["Category successfully deleted !!"]
        ]);
    }
}
