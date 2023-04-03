<?php

namespace App\Http\Controllers;

use App\Models\ProductDetailImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductDetailImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create(Request $request){
        $request->validate([
            "image"=>"required"
        ]);

        $image = new ProductDetailImage([
            "product_detail_id"=>$request->get("id"),
            "image"=>$request->get("image")
        ]);

        $image->save();

        return redirect()->route('admin.productdetail.index', $request->get("slug"));
    }

    public function delete(Request $request){
        $image = ProductDetailImage::find($request->id);
        $image->delete();

        return redirect()->route('admin.productdetail.index', $request->get("slug"));
    }
}
