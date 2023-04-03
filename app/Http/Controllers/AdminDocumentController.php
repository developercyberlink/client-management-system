<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AdminDocuments;
use Image;

class AdminDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'file' => ['required'],           
        ]);
         $admin = Admin::find($request->get("id"));
          $name = '';
        //upload document
        if ($request->hasFile('file')) {
            $file = $request->file('file');         
            $name = time() . '.' . $file->getClientOriginalExtension();             
            $destinationPath = public_path('/uploads/admin-documents');  
            $file->move($destinationPath, $name);            
        }
        $admin = AdminDocuments::create([
            'admin_id'=>$admin->id,
            'title' => $request->get('title'),              
            'file' => $name,      
        ]);
        return redirect()->back()->with('message','Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = AdminDocuments::find($id);
      if($data->file != NULL){
         if(file_exists(env('PUBLIC_PATH').'uploads/admin-documents/' . $data->file)){
            unlink(env('PUBLIC_PATH').'uploads/admin-documents/' . $data->file);
          }
      }
       $data->delete();
      return redirect()->back()->with('message','Deleted Sucessfully.');
    }
    
}
