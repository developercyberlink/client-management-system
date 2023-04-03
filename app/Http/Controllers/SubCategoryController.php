<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('sub_category_access');
        $subcategories = SubCategory::all();

        return view('admin.subcategory.index', ["subcategories"=>$subcategories]);
    }

    public function add(){
        $this->authorize('sub_category_add');
        $categories = Category::all();

        return view('admin.subcategory.add', ["categories"=>$categories]);
    }

    public function create(Request $request){
        $this->authorize('sub_category_add');
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'slug'=>'required|unique:contents,slug',
            'cover_image'=>'required',
            'category'=>'required'
        ]);

        $id = ContentController::create($request);

        $subcategory = new SubCategory([
            "content_id"=>$id,
            "category_id"=>$request->get('category')
        ]);

        $subcategory->save();

        return redirect()->route('admin.subcategory.index');
    }

    public function edit($slug){
        $this->authorize('sub_category_edit');
        $content = Content::where('slug', $slug)->first();
        $subcategory = SubCategory::where('content_id', $content->id)->first();
        $categories = Category::all();

        return view('admin.subcategory.edit', ["subcategory" => $subcategory, "categories"=>$categories]);
    }

    public function update(Request $request){
        $this->authorize('sub_category_edit');

        $subcategory = SubCategory::find($request->get('id'));

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'slug'=>'required|unique:contents,slug,'.$subcategory->content->id
        ]);
        ContentController::update($request, $subcategory->content->id);

        $subcategory->category_id = $request->get('category');
        $subcategory->save();

        return redirect()->route('admin.subcategory.index');
    }

    public function delete($slug){
        $this->authorize('sub_category_delete');
        $content = Content::where('slug', $slug)->first();
        $subcategory = SubCategory::where('content_id', $content->id)->first();

        ContentController::delete($content->id);
        $subcategory->delete();

        return redirect()->route('admin.subcategory.index');
    }
}
