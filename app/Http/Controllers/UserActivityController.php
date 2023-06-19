<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\InvoiceItem;
use App\Models\ServiceType;
use Illuminate\Support\Str;
use App\Models\UserContacts;
use Illuminate\Http\Request;
use App\Models\UserDocuments;
use Illuminate\Support\Carbon;
use App\Models\client_services;
use App\Models\EstimateService;
use App\Models\ProgrammingType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }

    public function index(){
        $data = User::all(); 

        return view('admin.useractivity.index', compact('data'));
    }

    public function store(Request $request){ 
        $request->validate([
            'name' => ['required', 'string', 'max:191'],           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],          
        ]);
        $name = '';
        //upload document
        if ($request->hasFile('image')) {
            $file = $request->file('image');         
            $name = time() . '.' . $file->getClientOriginalExtension();             
            $destinationPath = public_path('/uploads/user-image');  
            $file->move($destinationPath, $name);            
        }
        $admin = User::create([
            'email'=>$request->get('email'),
            'name' => $request->get('name'),              
            'image' => $name,
            'password' => Hash::make($request->get('password')),      
        ]);
        return redirect()->back()->with('message','Successfully added.');       
    }

    public function update(Request $request)
    {       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$request->get('id')],
        ]);
        $user = User::find($request->get("id"));
        if ($request->hasFile('image')) {             
            if($user->image){
                if(file_exists('uploads/user-image/' . $user->image)){
                    unlink('uploads/user-image/' . $user->image);
                }               
            }
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/user-image/');
            $image->move($destinationPath, $name);
            $user['image'] = $name;
        }               
        $user->name = $request->get("name");
        $user->email = $request->get("email");        
        $user->status = $request->get("status");
        if($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'string', 'min:8'],
            ]);
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();
        return redirect()->back()->with('message','Updated Successfully.');
    }



    public function details($id){
        // dd('ehe');
        $data = User::find($id);
        $contact = UserContacts::where('user_id',$data->id)->first();
        $contacts = UserContacts::where('user_id',$data->id)->get();
        $client_services = client_services::where('client_id',$data->id)->get();

        // $services = client_services::where('client_id',$data->id)->first();
        // dd($services);

        
        $service = Service::all();
        $show = Service::where(['show_service'=>'1', 'show_programming'=>'1'])->first();
        // dd($show);
        if($client_services->isNotEmpty())
        {
        $invoice=Invoice::where('service_id',$client_services->first()->id)->first();
        // dd($invoice);
        // $status = cilent_services::where('id', $invoice->service_id)->first();
        }
        
        $servicetype = ServiceType::all();
        $programming = ProgrammingType::all();
        return view('admin.useractivity.single', compact('data','show','contact','contacts','service','servicetype',
        'programming','client_services'));
    }

    public function destroy($id){
        $data = User::find($id);
        if($data->image != NULL){
            if(file_exists(env('PUBLIC_PATH').'uploads/user-image/' . $data->image)){
            unlink(env('PUBLIC_PATH').'uploads/user-image/' . $data->image);
            }
        }
        $service =client_services::where('client_id',$id)->first();
        if($service != null){
            $service->delete();
            $invoice = Invoice::where('service_id', $service->id)->first();
            // dd($invoice);
            if($invoice){
                $invoice->delete();
            }
                
            
        }
            $estimate = EstimateService::where('client_id', $data->id)->get();
            // dd($estimate);
            
            if($estimate){
                foreach($estimate as $item){
                $estimate_invoice = Invoice::where('id', $item->estimate_id)->first();
                // dd($estimate_invoice);
                if($estimate_invoice != null){
                    $estimate_invoice->delete();
                }

                $item->delete();
                }
            }
            
        
        $data->delete();
        // if($service != null){
        //     $service->delete();
        //     $invoice = Invoice::where('service_id', $service->id)->first();
        //     if($invoice != null){
        //         $invoice->delete();
        //     }
        //     $estimate_service = EstimateService::where('service_id', $service->id)->first();
        //     if($estimate_service != null){
        //         $estimate_service->delete();
        //     }
            
        // }
        
        $documents = UserDocuments::where(['user_id'=>$id])->get();
       
        foreach($documents as $document) {
            if($document != NULL ){
                if(file_exists(env('PUBLIC_PATH') . 'uploads/documents/' . $document->document)){
                    unlink(env('PUBLIC_PATH') . 'uploads/documents/' . $document->document);
                }
            }
            $document->delete();
        }
      
        return redirect()->back()->with('message','Deleted Sucessfully.');
    }

    public function contacts(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:191'],           
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=>['required','string', 'max:10'],          
        ]);
        $user = User::find($request->get("id"));        
        $contacts = UserContacts::create([
            'user_id'=>$user->id,
            'email'=>$request->get('email'),
            'name' => $request->get('name'),              
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),     
        ]);
        return redirect()->back()->with('message','Successfully added.');          
    }

    public function contactsdelete($id){
        $data = UserContacts::find($id);      
        $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.'); 
    }


    public function documents(Request $request){
        $request->validate([
            'document' => ['required', 'max:10000'],
            'document_title'=>['required', 'string', 'max:191'],
        ]);
        $user = User::find($request->get("id")); 
        $documents = new UserDocuments();
        $docOriginal =  $request->file('document');
        $docSize = convertSize($request->file('document')->getSize());
        $docNewName = '';
        if($request->hasFile('document')){
            $doc = $request->file('document')->getClientOriginalName();
            $extension = $request->file('document')->getClientOriginalExtension();
            $docName = explode('.', $doc);
            $docNewName = Str::slug($docName[0]) . '-' . Str::random(7) . '.' . $extension;
            $path = public_path('uploads/documents'); 
            $docOriginal->move($path, $docNewName);
        }
        $documents['document'] = $docNewName;
        $documents['document_title'] = $request->document_title;
        $documents['user_id'] = $user->id;
        $documents['document_size'] = $docSize;
        $documents->save();
        return redirect()->back()->with('message','Successfully added.'); 
    }

    public function documentsDelete($id){
        $data = UserDocuments::find($id);
        if($data->document != NULL ){
            if(file_exists(env('PUBLIC_PATH') . 'uploads/documents/' . $data->document)){
                unlink(env('PUBLIC_PATH') . 'uploads/documents/' . $data->document);
            }
        }
        $data->delete();
        return redirect()->back()->with('message','Deleted Sucessfully.');
    }

    public function services(Request $request){
        $request->validate([
            'service' => ['required', 'string', 'max:191'],          
            'price'=>['required','string', 'max:10'],                     
        ]);
        $user = User::find($request->get("id"));        
        $services = client_services::create([
            'client_id'=>$user->id,
            'service'=>$request->get('service'),
            'service_type' => $request->get('service_type'),              
            'programming_type' => $request->get('programming_type'),
            'domain' => $request->get('domain'),
            'price'=>$request->get('price'),
            'registered' => $request->get('registered'),               
            'expiring' => $request->get('expiring'),
            'status' => $request->get('status'),  
            'time' => $request->get('time')    
        ]);
        return redirect()->back()->with('message','Successfully added.');       
    }

    public function service_edit($id){
        $data = client_services::find($id);       
        
        $service = Service::all();
        $servicetype = ServiceType::all();
        $programming = ProgrammingType::all();
      return view('admin.useractivity.service-edit', ["data"=>$data,"service"=>$service,"servicetype"=>$servicetype,"programming"=>$programming]);
    }

    public function service_update(Request $request){   
         $request->validate([                      
            'price'=>['required','string', 'max:10'],                      
        ]);
        $data = client_services::find($request->id);                
        $data->service_type = $request->get("service_type");        
        $data->programming_type = $request->get("programming_type");
        $data->domain = $request->get("domain");
        $data->price = $request->get("price");        
        $data->registered = $request->get("registered");
        $data->expiring = $request->get("expiring");
        $data->status = $request->get("status");
        $data->time = $request->get("time");
        $data->save();
        return redirect()->back()->with('message','Updated Successfully.');
     
    }


    public function servicedelete($id){ 
        // dd($id);
        $data = client_services::find($id);      
        // dd($data);
       $invoice = Invoice::where('service_id',$data->id)->first();
    //    dd($invoice);
    if($data->id != null || $invoice->id != null){
        $estimate = EstimateService::where([ 'service_id'=>$data->id])->first();
        if($estimate != null){
            $estimate->delete();
        }
        
    }
        $data->delete();
        if($invoice != null){
            $invoice->delete();  
        }
        
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }

    public function generate_invoice(Request $request) 
    {        
        $this->authorize('invoice_edit');  
        $id=$request->id;
        $service = client_services::where('id',$id)->first();  
        $user=User::where('id',$service->client_id)->first();
        $if_invoice=Invoice::where('service_id',$service->id)->first();
        // if($if_invoice == null)
        // {
            $random = rand(1,1000)  ;
        $invoice = Invoice::updateorCreate([
            "service_id"=> $service->id],
            [
            "user_id"=> $service->client_id,
            "total"=>$service->price * $service->time,  
            "vat"=>0,
            "discount"=>0,
            "invoice_no"=>"SER-$random",
            "remarks"=>NULL,
            "date_of_entry"=>Carbon::now(),
            "status"=>$service->status,
        ]);
        // dd($invoice);
          $invoice_item = InvoiceItem::firstorCreate([
            "invoice_id"=> $invoice->id],
            [
            "particular"=> service($service->service),
            "service_id"=>$service->id,
            "rate"=>'1',
            "amount"=>$service->price,
            "time"=>$service->time,
        ]);
    // }
         return view('admin.useractivity.service-invoice', [
            "service"=>$service,
            'invoice'=>$if_invoice ? $if_invoice : $invoice,
            'user'=>$user ,
            'if_invoice'=>$if_invoice          
        ]);   
    }
   public function generateFinalInvoice($id){
    // dd($id);
    $this->authorize('invoice_edit'); 
    $invoice = Invoice::find($id);
    // dd($id);
    // dd($invoice);
    $invoice_item = InvoiceItem::where('invoice_id', $invoice->id)->get();
    // dd($invoice_item);
    $service_id = EstimateService::where('estimate_id',$invoice->id)->first();
    // dd($service_id);
    $service = Service::where('id', $service_id)->first();
    // dd($service);
    $user=User::where('id',$invoice->user_id)->first();
    // dd($user);
    $cilent_service = client_services::where([ 'client_id'=>$user->id])->first();
    // dd($cilent_service);
    $invoice->final_invoice = '1';
    $invoice->update();
    // dd($invoice); 
    return view('admin.useractivity.service-finalInvoice',[
        "user"=>$user,
        "service"=>$service,
        "invoice"=> $invoice,
        "invoice_item"=>$invoice_item,
        'cilent_service'=>$cilent_service
    ]);
   }
}
