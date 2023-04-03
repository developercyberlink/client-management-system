<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index(){

        return view('user.invoice.index');
    }

    public function single($invoice_no){
        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        if($invoice->user_id != Auth::user()->id){
            abort('403');
        }

        return view('user.invoice.single', ["invoice"=>$invoice]);
    }
}
