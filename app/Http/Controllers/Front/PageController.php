<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $products = Product::latest()->filter(request(['tag']))->get();

        return view('frontend.index', ['products'=>$products]);
    }

    public function search(Request $request){

        $products = Product::query()
                    ->where('title', 'LIKE', '%' . $request->get('query') . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->get('query') . '%')
                    ->get();
        
        

        $array = array();
        foreach($products as $product){
            $array[] = array("title"=>$product->title, "image"=>$product->cover_image);
        }

        return json_encode($array);
        // Single return
        /*$data = array("title"=>$request->get("query"), "image"=>"http:image");

        return json_encode($data);*/
    }
}
