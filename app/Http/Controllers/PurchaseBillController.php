<?php

namespace App\Http\Controllers;

use App\Models\PurchaseBill;
use App\Models\PurchaseBillItem;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseBillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $this->authorize('purchase_bill_access');
        $bills = PurchaseBill::all();

        return view('admin.purchasebill.index', ["bills"=>$bills]);
    }

    public function add(){
        $this->authorize('purchase_bill_add');
        $vendors = Vendor::all();

        return view('admin.purchasebill.add', ["vendors"=>$vendors]);
    }

    public function create(Request $request){
        $this->authorize('purchase_bill_add');

        $request->validate([
            "amount"=>"required",
            "rate"=>"required",
            "vendor"=>"required",
            "bill_no"=>"required|unique:purchase_bills,bill_no",
            "date_of_entry"=>"required",
        ]);

        $bill = PurchaseBill::create([
            "vendor_id"=>$request->get("vendor"),
            "total"=>$request->get("total"),
            "vat"=>$request->get("vat"),
            "discount"=>$request->get("discount"),
            "bill_no"=>$request->get("bill_no"),
            "remarks"=>$request->get("remarks"),
            "date_of_entry"=>$request->get("date_of_entry"),
        ]);

        $bill->save();

        $rates = $request->get("rate");
        $amounts = $request->get("amount");
        $particulars = $request->get("particular");

        for ($i = 0; $i < count($rates); $i++) {
            PurchaseBillItem::create([
                "particular"=>$particulars[$i],
                "amount"=>$amounts[$i],
                "rate"=>$rates[$i],
                "purchase_bill_id"=>$bill->id,
            ]);
         }

        return redirect()->route('admin.purchasebill.index');
    }

    public function edit($bill_no){
        $this->authorize('purchase_bill_edit');

        $bill = PurchaseBill::where('bill_no', $bill_no)->first();
        $vendors = Vendor::all();

        return view('admin.purchasebill.edit', ["bill"=>$bill, "vendors"=>$vendors]);
    }

    public function update(Request $request){
        $this->authorize('purchase_bill_edit');

        $bill = PurchaseBill::find($request->get("id"));

        $request->validate([
            "amount"=>"required",
            "rate"=>"required",
            "vendor"=>"required",
            "bill_no"=>"required|unique:purchase_bills,bill_no,".$bill->id,
            "date_of_entry"=>"required",
        ]);

        $bill->vendor_id = $request->get("vendor");
        $bill->total = $request->get("total");
        $bill->vat = $request->get("vat");
        $bill->discount = $request->get("discount");
        $bill->bill_no = $request->get("bill_no");
        $bill->remarks = $request->get("remarks");
        $bill->date_of_entry = $request->get("date_of_entry");

        $bill->save();

        DB::table('purchase_bill_items')->where('purchase_bill_id', $request->get("id"))->delete();

        $rates = $request->get("rate");
        $amounts = $request->get("amount");
        $particulars = $request->get("particular");

        for ($i = 0; $i < count($rates); $i++) {
            PurchaseBillItem::create([
                "particular"=>$particulars[$i],
                "amount"=>$amounts[$i],
                "rate"=>$rates[$i],
                "purchase_bill_id"=>$bill->id,
            ]);
         }

         return redirect()->route('admin.purchasebill.index');
    }


    public function delete($bill_no){
        $this->authorize('purchase_bill_delete');

        $bill = PurchaseBill::where('bill_no', $bill_no)->first();
        $bill->delete();

        return redirect()->route('admin.purchasebill.index');

    }

}
