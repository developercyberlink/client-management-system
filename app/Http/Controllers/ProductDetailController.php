<?php

namespace App\Http\Controllers;

use App\Models\ColorSize;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index($slug){
        $this->authorize('product_manage');
        $product = Product::where('slug', $slug)->first();
        $colors = ColorSize::where('type', 0)->get();
        $sizes = ColorSize::where('type', 1)->get();

        return view('admin.product_detail.index', ["product"=>$product, "colors"=>$colors, "sizes"=>$sizes]);
    }

    public function add($slug){
        $this->authorize('product_manage');
        $product = Product::where('slug', $slug)->first();
        $colors = ColorSize::where('type', 0)->get();
        $sizes = ColorSize::where('type', 1)->get();

        return view('admin.product_detail.add', ["product"=>$product, "colors"=>$colors, "sizes"=>$sizes]);
    }

    public function create(Request $request){
        $this->authorize('product_manage');

        $validator = Validator::make($request->all(), [
            "quantity"=>"required|numeric|min:0"
        ]);

        if($validator->fails()){
            return response()->json([
                "errors"=>$validator->errors()->all()
            ]);
        }

        $existing_detail = ProductDetail::where([
            ['product_id', '=', $request->get("product_id")],
            ['color_id', '=', $request->get("color")],
            ['size_id', '=', $request->get("size")],
        ])->first();

        if($existing_detail!=null){

            $current_quantity = $existing_detail->quantity;
            $current_quantity += $request->get("quantity");
            $existing_detail->quantity = $current_quantity;

            $existing_detail->save();

            return response()->json([
                "success"=>["Product detail has been added to existing database !!"]
            ]);
        }else{
            $detail = new ProductDetail([
                "product_id"=>$request->get("product_id"),
                "quantity"=>$request->get("quantity"),
                "color_id"=>$request->get("color"),
                "size_id"=>$request->get("size"),
            ]);
    
            $detail->save();

            return response()->json([
                "success"=>["New detail has been updated !!"]
            ]);
        }
    }

    public function update(Request $request){
        $this->authorize('product_manage');

        $request->validate([
            "quantity"=>"required|numeric|min:0"
        ]);

        $detail = ProductDetail::find($request->get("id"));

        $detail->quantity = $request->get("quantity");
        $detail->color_id = $request->get("color");
        $detail->size_id = $request->get("size");

        $detail->save();

        return redirect()->route('admin.productdetail.index', $request->get('slug'));
    }

    public function delete(Request $request){
        $this->authorize('product_manage');
        $detail = ProductDetail::find($request->get("id"));
        $detail->delete();

        return redirect()->route('admin.productdetail.index', $request->get('slug'));
    }

}
