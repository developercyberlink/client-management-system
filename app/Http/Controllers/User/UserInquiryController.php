<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class UserInquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(){
        $services = Service::all();
        $inquiries = Inquiry::where('user_id', Auth::id())->get();

        return view('user.inquiry.index', compact('services', 'inquiries'));
    }

    public function create(Request $request){
        $request->validate([
            "service"=>"required",
            "inquiry"=>"required"
        ]);

        $inquiry = Inquiry::create([
            'service_id'=>$request->service,
            'user_id'=> Auth::id(),
            'inquiry'=> $request->inquiry,
        ]);

        return redirect()->route('user.inquiry.index');
    }
}
