<?php

namespace App\Http\Controllers;

use services;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\InvoiceItem;
use App\Models\UserContacts;
use Illuminate\Http\Request;
use App\Models\client_services;
use App\Models\EstimateService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $this->authorize('invoice_access');
        $invoices = Invoice::where('status',1)->get();

        return view('admin.invoice.index', ["invoices"=>$invoices]);
    }

    public function add(Request $request){
        $this->authorize('invoice_add');
      
        $users = User::all();
           if ($request->ajax()) { 
             $user_id= $request->value;
            $services = client_services::where('client_id',$user_id)->get();
            // dd($services)
             return view('admin.invoice.filter_service', ["services"=>$services]);
        }

        $service = client_services::all();
        return view('admin.invoice.add', [
            "users"=>$users, 
            "service"=> $service,
        ]);
    }

    public function create(Request $request){
        $this->authorize('invoice_add');  
// dd($request->all());
        $request->validate([
            "amount"=>"required",
            "rate"=>"required",
            "user_id"=>"required",
            "services"=>"required",
            "invoice_no"=>"required|unique:invoices,invoice_no", 
            "time"=>"required",
            "date_of_entry"=>"required",
        ]);


        $service =  $request->services;
        $service_id = Service::where('title', $service)->first()->id;
        // dd($service_id);
        $invoice = Invoice::create([
            "user_id"=>$request->get("user_id"),
            "total"=>$request->get("total"),
            "vat"=>$request->get("vat"),
            "discount"=>$request->get("discount"),
            "invoice_no"=>$request->get("invoice_no"),
            "remarks"=>$request->get("remarks"),
            "date_of_entry"=>$request->get("date_of_entry"),
            "status"=>$request->get("status"),
            "invoice_status"=>$request->get("invoice_status"),
        ]);
        // dd($invoice);
        $invoice->save();
        // dd($invoice->id);
        // dd($invoice->user_id);
        $estimate = EstimateService::create([
            "estimate_id" => $invoice->id,
            "service_id"=> $service_id,
            "client_id"=>$invoice->user_id,
        ]);
        // dd($estimate);
        $rates = $request->get("rate");
        $amounts = $request->get("amount");
        $particulars = $request->get("services");
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
        // dd($invoice);       
        $user = User::where('id',$invoice->user_id)->first();      
        $service =client_services::where('id',$invoice->service_id)->first();
        // dd($service);
        return view('admin.invoice.view', [
            "invoice"=>$invoice,          
            "user"=>$user,           
            "service"=>$service,
        ]);
    }


    public function edit($invoice_no){
        // dd($invoice_no);
        $this->authorize('invoice_edit');
        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        // dd($invoice);
        $users =  User::all();
        $user = User::where('id',$invoice->user_id)->first();      

        return view('admin.invoice.edit', [
            "invoice"=>$invoice,
            "users"=>$users,
            "user"=>$user,           
        ]);
    }

    public function update(Request $request){
        // dd($request->all());
        $this->authorize('invoice_edit');
        $invoice = Invoice::find($request->get("id"));
        $user = User::where('id',$invoice->user_id)->first(); 
        // dd($user);
        // $request->validate([
        //     "amount"=>"required",
        //     "rate"=>"required",
        //     "user"=>"required",
        //     "invoice_no"=>"required|unique:invoices,invoice_no,".$invoice->id,
        //     "time"=>"required",
        //     "date_of_entry"=>"required",
        // ]);

        $invoice->user_id = $request->get("user");
        $invoice->total = $request->get("total");
        $invoice->vat = $request->get("vat");
        $invoice->discount = $request->get("discount");
        $invoice->invoice_no = $request->get("invoice_no");
        $invoice->remarks = $request->get("remarks");
        $invoice->date_of_entry = $request->get("date_of_entry");
        $invoice->status = $request->get("status");
        $invoice->invoice_status = $request->get("invoice_status");
        $invoice->save();
        DB::table('invoice_items')->where('invoice_id', $request->get("id"))->delete();

        $service= client_services::where('id', $invoice->service_id)->first();
        // dd($service);
        if($service != null){
            $service->update([
                'status' => $request->get("service_status")
            ]);
        }
        
        // dd($service);
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

         return redirect()->route('admin.clients.details', $user->id);
    }

    public function delete($invoice_no){
        $this->authorize('invoice_delete');

        $invoice = Invoice::where('invoice_no', $invoice_no)->first();
        $estimate = EstimateService::where('estimate_id', $invoice_no)->get();
        $invoice->delete();
        foreach($estimate as $item){
            $item->delete();
        }
        return redirect()->route('admin.invoice.index');
    }
    //for pdf export
    public function export($invoice_no){
        
        $data = Invoice::where('invoice_no',$invoice_no)->first();
        $id = $data->id;
        $data1 = InvoiceItem::where('invoice_id', $id)->get();
        // dd($data1);
        // dd($data);
        // view()->share('invoice',$data);
        // $pdf= PDF::loadview('admin.invoice.invoice',array('data'=>$data));
        $pdf = Pdf::loadView('admin.invoice.invoice', [
            'data'=>$data,
            'data1'=>$data1
        ]);
        return $pdf->stream();
    }
    //for email
    public function email($invoice_no){
        $data = Invoice::where('invoice_no',$invoice_no)->first();
        $id = $data->id;
        $data1 = InvoiceItem::where('invoice_id', $id)->get();
       return view('email.invocieMail',[
        "data"=>$data,
        "data1"=>$data1,
       ]);
    }
    public function cancleInvoice($id){
        $invoice = Invoice::where('id', $id)->first();
        if($invoice->service_id != null){
            $service = client_services::where('id', $invoice->service_id)->first();
            $service->update([
                'status'=>'2'
            ]);
        }
        else{
            $invoice->invoice_status = '2';
            $invoice->update();
        }
        return redirect()->back()->with('message','Invoice has been canceled successfully');
    }
    public function markPaid($id){
       $invoice = Invoice::find($id);
    //    dd($invoice);
    $invoice->invoice_status = '1';
    $invoice->update();
    return back()->with('message', 'Status Updated');   
    }
}
