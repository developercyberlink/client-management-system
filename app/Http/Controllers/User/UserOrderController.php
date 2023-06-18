<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Orders;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(){
        $services = Service::orderBy('id','desc')->get();
        $orders= Orders::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('user.order.index', compact('services', 'orders'));
    }

    public function create(Request $request) {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $companyName = User::where('id', Auth::id())->first()->name;
        Orders::create([
            'order_id' => generateOrderNumber(),
            'user_id'=> $request->userId,
            'service_id' => $request->service,
            'company' =>  $companyName,
            'email' => $request->email,
            'contact_person' => $request->contactName,
            'contact_no' => $request->contactNo ,
            'by_admin' => $request->addByAdmin,
        ]);
        return redirect()->back()->with('message','Order Created Successfully.');
    }
  
}
