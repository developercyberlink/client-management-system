<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Service;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = Orders::orderBy('id', 'desc')->get();
        $service = Service::orderBy('id', 'desc')->get();
        $client = User::orderBy('id', 'desc')->get();
        return view('admin.order.index', compact('data', 'service', 'client'));
    }

    public function edit($id){
        $data = Orders::find($id);
        $service = Service::orderBy('id', 'desc')->get();
        $client = User::orderBy('id', 'desc')->get();
        return view('admin.order.single', compact('data', 'service', 'client'));
    }

    public function create(Request $request) {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $formFields = [
            'order_id' => 'CPL' . '-' . generateOrderNumber(),
            'service_id' => $request->service,
            'email' => $request->email,
            'contact_person' => $request->contactName,
            'contact_no' => $request->contactNo ,
            'price' => $request->price,
            'status' => $request->status,
            'by_admin' => $request->addByAdmin,
            'remark' => $request->remark,
        ];
        if($request->client) {
            $formFields['user_id'] = $request->client;
            $formFields['company'] = User::where('id', $request->client)->first()->name;
        } 
        Orders::create($formFields);
        return redirect()->back()->with('message','Order Created Successfully.');  
    }

    public function update(Request $request) {
        $order = Orders::find($request->id);
        $order->service_id = $request->service;
        $order->email = $request->email;
        $order->contact_person = $request->contactName;
        $order->contact_no = $request->contactNo;
        $order->price = $request->price;
        $order->status = $request->status;
        $order->remark = $request->remark;
        if($request->client) {
            $companyName = User::where('id', $request->client)->first()->name;
            $order->user_id = $request->client;
            $order->company =  $companyName;
        }
        $order->save();
        return back()->with('message', 'Order Updated Successfully.');
    }

    public function delete($id) {
        $order = Orders::find($id);
        $order->delete();
        return redirect()->back()->with('message', 'Order Deleted Successfully.');
    }
}
