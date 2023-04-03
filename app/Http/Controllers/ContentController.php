<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public static function create(Request $request){

        $content_data = new Content([
            "title"=>$request->get('title'),
            "description"=>$request->get('description'),
            "slug"=>$request->get('slug'),
            "cover_image"=>$request->get("cover_image")
        ]);

        $content_data->save();

        $id = $content_data->id;

        return $id;
    }

    public static function update(Request $request, $id){

        $content_data = Content::find($id);

        $content_data->cover_image = $request->get('cover_image');
        $content_data->title = $request->get('title');
        $content_data->description = $request->get('description');
        $content_data->slug = $request->get('slug');

        $content_data->save();

    }

    public static function delete($id){
        $content_data = Content::Find($id);
        
        $content_data->delete();
    }
}
