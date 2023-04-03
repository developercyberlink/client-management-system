<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = Newsletter::all();

        return view('admin.newsletter.index', compact('data'));
    }

    public function add(){
        $users = User::all();
        $templates = array_slice(scandir(resource_path('views/newsletter/')), 2);

        return view('admin.newsletter.add', compact('users', 'templates'));
    }

    public function sendNewsletter(Request $request){

        // Validation
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'content'=>'required',
            'users'=>'required',
        ]);

        // Validation error message
        if($validator->fails()){
            return response()->json([
                "status"=>'error',
                "errors"=>$validator->errors()->all()
            ]);
        }

        // Create newsletter object
        $newsletter = Newsletter::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "template"=>$request->template,
        ]);

        // Send mail to all users via queue system
        foreach($request->users as $id){
            $email = User::where('id', $id)->pluck('email')->first();
            Mail::to($email)->queue(
                new NewsletterMail($request->title, $request->content, $request->template)
            );
        }

        // Relation of newsletter and users
        $newsletter->users()->attach($request->users);

        // Success message
        return response()->json([
            "status"=>"success",
            "message"=>"Newsletter successfully sent !!",
        ]);
    }

    public function detail($id){
        $data = Newsletter::find($id);

        return view('admin.newsletter.detail', compact('data'));
    }
}
