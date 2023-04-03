<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use App\Models\UserContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $this->authorize('invoice_access');
        $invoices = Invoice::all();

        return view('admin.invoice.index', ["invoices"=>$invoices]);
    }

    public function add(){
        $this->authorize('invoice_add');
        $users = User::all();

        return view('admin.invoice.add', ["users"=>$users]);
    }

    public function create(Request $request){
        $this->authorize('invoice_add');

        $request->validate([
            "amount"=>"required",
            "rate"=>"required",
            "user"=>"required",
            "invoice_no"=>"required|unique:invoices,invoice_no",
            "time"=>"required",
            "date_of_entry"=>"required",
        ]);

        $invoice = Invoice::create([
            "user_id"=>$request->get("user"),
            "total"=>$request->get("total"),
            "vat"=>$request->get("vat"),
            "discount"=>$request->get("discount"),
            "invoice_no"=>$request->get("invoice_no"),
            "remarks"=>$request->get("remarks"),
            "date_of_entry"=>$request->get("date_of_entry"),
            "status"=>$request->get("status"),
        ]);

        $invoice->save();

        $rates = $request->get("rate");
        $amounts = $request->get("amount");
        $particulars = $request->get("particular");
        $times = $request->get("time");

        for ($i = 0; $i < count($rates); $i++) {
            InvoiceItem::create([
                "particular"=>$particulars[$i],
                "amount"=>$amounts[$i],
                "rate"=>$rates[$i],
                "time"=>$times[$i],
                "invoice_id"=>$invoice->id,
            ]);
         }

         return redirect()->route('admin.invoice.index');
    }

    public function view($id){       
        $invoice = Invoice::where('id', $id)->first();        
        $user = User::where('id',$invoice->user_id)->first();      

        return view('admin.invoice.view', [
            "invoice"=>$invoice,          
            "user"=>$user,           
        ]);
    }


    public function edit($invoice_no){
        $this->authorize('invoice_edit');
        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        $users =  User::all();
        $user = User::where('id',$invoice->user_id)->first();      

        return view('admin.invoice.edit', [
            "invoice"=>$invoice,
            "users"=>$users,
            "user"=>$user,           
        ]);
    }

    public function update(Request $request){
        $this->authorize('invoice_edit');

        $invoice = Invoice::find($request->get("id"));

        $request->validate([
            "amount"=>"required",
            "rate"=>"required",
            "user"=>"required",
            "invoice_no"=>"required|unique:invoices,invoice_no,".$invoice->id,
            "time"=>"required",
            "date_of_entry"=>"required",
        ]);

        $invoice->user_id = $request->get("user");
        $invoice->total = $request->get("total");
        $invoice->vat = $request->get("vat");
        $invoice->discount = $request->get("discount");
        $invoice->invoice_no = $request->get("invoice_no");
        $invoice->remarks = $request->get("remarks");
        $invoice->date_of_entry = $request->get("date_of_entry");
        $invoice->status = $request->get("status");

        $invoice->save();

        DB::table('invoice_items')->where('invoice_id', $request->get("id"))->delete();

        $rates = $request->get("rate");
        $amounts = $request->get("amount");
        $particulars = $request->get("particular");
        $times = $request->get("time");

        for ($i = 0; $i < count($rates); $i++) {
            InvoiceItem::create([
                "particular"=>$particulars[$i],
                "amount"=>$amounts[$i],
                "rate"=>$rates[$i],
                "time"=>$times[$i],
                "invoice_id"=>$invoice->id,
            ]);
         }

         return redirect()->route('admin.invoice.index');
    }

    public function delete($invoice_no){
        $this->authorize('invoice_delete');

        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        $invoice->delete();

        return redirect()->route('admin.invoice.index');
    }
}
