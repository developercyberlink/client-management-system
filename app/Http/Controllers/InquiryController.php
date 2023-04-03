<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = Inquiry::where('status', 0)->get();

        return view('admin.inquiry.index', compact('data'));
    }

    public function single($id){
        $data = Inquiry::find($id);

        return view('admin.inquiry.single', compact('data'));
    }

    public function reply(Request $request){
        $request->validate([
            "reply"=>"required",
        ]);

        $data = Inquiry::find($request->id);
        $data->reply = $request->reply;

        $data->save();

        return redirect()->route('admin.inquiry.index');
    }

    public function markOrder($id){
        $data = Inquiry::find($id);
        $data->status = 1;
        $data->save();

        return redirect()->route('admin.inquiry.index');
    }
}
