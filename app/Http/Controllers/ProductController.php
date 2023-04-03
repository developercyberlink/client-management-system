<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('product_access');
        $products = Product::all();

        return view('admin.product.index', ["products"=>$products]);
    }

    public function add(){
        $this->authorize('product_add');
        $subcategories = SubCategory::all();

        return view('admin.product.add', ["subcategories"=>$subcategories]);
    }

    public function create(Request $request){
        $this->authorize('product_add');
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:products,slug',
            'introduction'=>'required',
            'description'=>'required',
            'price'=>'required',
            'sku'=>'required',
            'subcategory'=>'required',
            'cover_image'=>'required',
            'tags'=>'required',
        ]);

        $product = new Product([
            'title'=>$request->get('title'),
            'slug'=>$request->get('slug'),
            'introduction'=>$request->get('introduction'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
            'sku'=>$request->get('sku'),
            'discounted_price'=>$request->get('discounted_price'),
            'cover_image'=>$request->get('cover_image'),
            'tags'=>$request->get('tags')
        ]);

        $product->save();

        $product->subCategories()->attach($request->get('subcategory'));

        return redirect()->route('admin.product.index');

    }

    public function edit($slug){
        $this->authorize('product_edit');
        $product = Product::where('slug', $slug)->first();
        $subcategories = SubCategory::all();

        return view('admin.product.edit', ["product" => $product, "subcategories"=>$subcategories]);
    }

    public function update(Request $request){
        $this->authorize('product_edit');
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:products,slug,'.$request->get("id"),
            'introduction'=>'required',
            'description'=>'required',
            'price'=>'required',
            'sku'=>'required',
            'subcategory'=>'required',
            'cover_image'=>'required',
            'tags'=>'required',
        ]);

        $product = Product::find($request->get("id"));
        $product->title = $request->get("title");
        $product->slug = $request->get("slug");
        $product->introduction = $request->get("introduction");
        $product->description = $request->get("description");
        $product->price = $request->get("price");
        $product->sku = $request->get("sku");
        $product->discounted_price = $request->get("discounted_price");
        $product->cover_image = $request->get("cover_image");
        $product->tags = $request->get("tags");

        $product->save();

        $product->subCategories()->sync($request->get('subcategory'));

        return redirect()->route('admin.product.index');

    }

    public function delete($slug){
        $this->authorize('product_delete');
        $product = Product::where('slug', $slug)->first();
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
