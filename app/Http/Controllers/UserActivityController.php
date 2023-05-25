<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Support\Str;
use App\Models\UserContacts;
use Illuminate\Http\Request;
use App\Models\UserDocuments;
use App\Models\client_services;
use App\Models\ProgrammingType;
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
        
        $data = User::with(['documents'])->find($id);
        $contact = UserContacts::where('user_id',$data->id)->first();
        $contacts = UserContacts::where('user_id',$data->id)->get();
        $client_services = client_services::where('client_id',$data->id)->get();
        $service = Service::all();
        $servicetype = ServiceType::all();
        $programming = ProgrammingType::all();
        return view('admin.useractivity.single', compact('data','contact','contacts','service','servicetype','programming','client_services'));
    }

    public function destroy($id){

        $data = User::find($id);
        $document = $data->documents->first()->document;
        if($data->image != NULL){
            if(file_exists(env('PUBLIC_PATH').'uploads/user-image/' . $data->image)){
            unlink(env('PUBLIC_PATH').'uploads/user-image/' . $data->image);
            }
        }
        if($document != NULL ){
            if(file_exists(env('PUBLIC_PATH') . 'uploads/documents/' . $document)){
                unlink(env('PUBLIC_PATH') . 'uploads/documents/' . $document);
            }
    }
        $data->delete();
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
        $data->save();
        return redirect()->back()->with('message','Updated Successfully.');
     
    }


    public function servicedelete($id){
        $data = client_services::find($id);      
        $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }
}
