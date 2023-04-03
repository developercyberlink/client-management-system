@extends('layouts.admin')

@section('content')
    
<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col">
            <h3 class="page-title">Service </h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard </a></li>
               <li class="breadcrumb-item active">Service </li>
            </ul>
         </div>
          <div class="col-auto float-right ml-auto">
           <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('admin.service.index')}}"><i class="la la-angle-left"></i> Back </a></li>
            </ul>            
         </div> 
      </div>
   </div>
   <!-- /Page Header -->
    
   <div class="row">
      <div class="col-md-12">        
          <form method="POST" action="{{route('admin.service.update')}}">
           @csrf             
            <!--  -->
            <div class="col-md-8">
               <div class="form-group">  
                 <input type="hidden" name="id" value="{{$data->id}}">                             
                  <label class="col-form-label">Service <span class="text-danger">* </span></label>
                  <input type="text" class="form-control" placeholder="Enter Service" name="title" value="{{$data->title}}">
               </div>
            </div>
            <!--  -->                       
             <div class="col-md-4">
                <button class="btn btn-primary submit-btn">Update </button>
             </div>
          </form>
         
      </div>
   </div>
</div>
<!-- /Page Content --> 

@endsection