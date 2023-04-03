<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $data = Inquiry::where('status', 1)->get();

        return view('admin.order.index', compact('data'));
    }

    public function single($id){
        $data = Inquiry::find($id);

        return view('admin.order.single', compact('data'));
    }
}
