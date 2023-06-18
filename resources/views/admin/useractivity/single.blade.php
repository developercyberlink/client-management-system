@extends('layouts.admin')

@section('content')

<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <h3 class="page-title"> </h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('admin.clients.index')}}"><i class="la la-angle-left"></i> Back </a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- /Page Header -->
   <div class="card mb-0">
      <div class="card-body">
         <div class="row">
            <div class="col-md-12">
               <div class="profile-view">
                  <div class="profile-img-wrap">
                     <div class="profile-img">                        
                        @if($data->image)
                        <img class="inline-block" src="{{url('uploads/user-image/'.$data->image)}}" alt="user">
                        @else
                        <img class="inline-block" src="{{asset('admin-assets/img/user.jpg')}}" alt="user">
                        @endif                       
                     </div>
                  </div>
                  <div class="profile-basic">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="profile-info-left">
                              <h3 class="user-name m-t-0"><i class="la la-check-circle text-success mr-2"></i>{{$data->name}}</h3>
                              <div class="small doj text-muted">Registered Date  : {{ $data->created_at->format('d D M Y H:i') }}</div>
                              <div class="staff-id">Client ID : CPL-{{$data->id}}</div>
                              <div class="staff-id">Email : {{$data->email}} </div>
                              <div class="staff-id">
                                <a class="btn btn-white btn-sm btn-rounded  "  ><i class="fa fa-dot-circle-o text-{{($data->status == 1)?'success':'danger'}}"></i> {{($data->status == 1)?'Active':'Inactive'}}</a>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <ul class="personal-info">
                              <li>
                                 <span class="title">Contact Person : </span>
                                 <span class="text"> {{$contact?$contact->name:'NULL'}} </span>
                              </li>
                              <li>
                                 <span class="title">Phone: </span>
                                 <span class="text"><a>{{$contact?$contact->phone:'NULL'}}</a></span>
                              </li>
                              <li>
                                 <span class="title">Email: </span>
                                 <span class="text"><a>{{$contact?$contact->email:'NULL'}}   </a></span>
                              </li>
                              <li>
                                 <span class="title">Address: </span>
                                 <span class="text">{{$contact?$contact->address:'NULL'}}</span>
                              </li>
                           </ul>
                        </div>
                       <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="card tab-box">
      <div class="row user-tabs">
         <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
               <li class="nav-item col-sm-2"><a class="nav-link active" data-toggle="tab" href="#Services">Services </a></li>
               <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" href="#Contacts">Contacts </a></li>
               <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" href="#Payment">Particulars </a></li>
               <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" href="#Documents">Documents </a></li>
               <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" href="#Tickets">Tickets </a></li>
               <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" href="#Invoice">Invoice </a></li>
            </ul>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="tab-content profile-tab-content">  
            <!-- Services Tab -->
            @include('admin.useractivity.services')  
            <!-- /Services Tab -->
             <!-- Contacts Tab -->
             @include('admin.useractivity.contacts') 
            <!-- /Contacts Tab -->
             <!-- Payment Tab -->
            @include('admin.useractivity.invoices')
            <!-- /Payment Tab -->
            <!-- Document Tab -->
             @include('admin.useractivity.documents')
            <!-- /Document Tab -->           
            <!-- Tickets Tab -->
             @include('admin.useractivity.ticket')
            <!-- /Tickets Tab -->
            <!-- Invoice Tab -->
            @include('admin.useractivity.final_invoice')
            <!-- /Invoice Tab -->
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
<!-- Profile Modal -->
   <div id="profile_info" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Profile Information</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form method="POST" action="{{ route('admin.clients.update') }}" enctype="multipart/form-data">
                   @csrf
                  <div class="profile-img-wrap edit-img">
                     @if($data->image)
                     <img class="inline-block" src="{{url('uploads/user-image/'.$data->image)}}" alt="user">
                     @else
                     <img class="inline-block" src="{{asset('admin-assets/img/user.jpg')}}" alt="user">
                     @endif
                     <div class="fileupload btn">
                        <span class="btn-text">edit</span>
                        <input class="upload" type="file" name="image">
                     </div>
                  </div>
                   <div class="row">                                    
                     <div class="col-sm-6">
                         <div class="form-group">
                            <input type="hidden" name="id" value="{{$data->id}}">
                             <label class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                             <input id="name" type="text" value="{{$data->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                         </div>
                              @error('name')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                     </div>                    
                         
                     <div class="col-sm-6">
                         <div class="form-group">
                             <label class="col-form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                             <input id="email" value="{{$data->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                             @enderror
                         </div>
                     </div>                                 
                    
                     
                      <div class="col-md-6">
                         <div class="form-group">
                             <label>Status </label>
                             <select class="select" name="status">
                             <option value="1" {{$data->status == 1?'selected':''}}>Active</option> 
                             <option value="0" {{$data->status == 0?'selected':''}}>Inactive</option>                                                
                             </select>
                         </div>
                     </div>
                     <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Password <span class="text-danger">* </span></label>
                        <div class="input-group mb-3">
                           <input type="password" class="form-control" placeholder="Update Password" name="password">
                           <!-- <div class="input-group-append">
                              <button class="btn btn-white" type="button">Generate</button>
                           </div> -->
                        </div>
                     </div>
                  </div>
                 </div>
                   
                  <div class="submit-section">
                     <button class="btn btn-primary submit-btn">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- /Profile Modal -->
@endsection
   @section('script')
      <script src="text/javascript">
         function changeButton(){
            var button = document.getElementByIs("myButton");
            button.innerHTML = "Paid";
         }
      </script>
   @endsection