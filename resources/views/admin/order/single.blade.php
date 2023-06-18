@extends('layouts.admin')

@section('content')

<div  class="content container-fluid" role="dialog">
   <div class="content container-fluid" role="document">
   <!-- Page Header -->
    <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <h3 class="page-title"> </h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('admin.order.index')}}"><i class="la la-angle-left"></i> Back </a></li>
            </ul>
         </div>
      </div>
   </div>
   <!-- /Page Header -->
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Order / {{$data->order_id}}  </h5>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{route('admin.order.update')}}">
            @csrf
            <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                     <input type="hidden" name="id" value="{{$data->id}}">
                        <label class="col-form-label">Services  <span class="text-danger">* </span></label>
                        <select class="form-control select serviceselect" name="service">
                           <option value="">Select Service </option>
                           @if($service->count()>0)
                           @foreach($service as $row)
                           <option value="{{$row->id}}" id = "option_{{$row->id}}" {{$row->id == $data->service_id ? 'selected': ''}}>{{$row->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Client/Company  <span class="text-danger">* </span></label>
                        <select class="form-control select serviceselect" name="client">
                           <option value="">Select Client </option>
                           @if($client->count()>0)
                           @foreach($client as $row)
                           <option value="{{$row->id}}" id = "option_{{$row->id}}" {{$row->id == $data->user_id ? 'selected':''}}>{{$row->name}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12"></div>
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">                               
                              <label class="col-form-label">Email <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Enter Email" value="{{$data->email}}" name="email">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">                               
                              <label class="col-form-label">Contact Person <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Enter Contact Person Name" value="{{$data->contact_person}}" name="contactName">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">                               
                              <label class="col-form-label">Contact Number <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Enter Contact Number" value="{{$data->contact_no}}" name="contactNo">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-form-label">Price<span class="text-danger"> </span></label>
                              <input type="text" placeholder="Price" name="price" value="{{$data->price}}" class="form-control">
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <h5 class="clearfix">Payment Status</h5>
                              <select class="select" name="status">
                              <option {{$data->status == 1 ? 'selected' : ''}} value="1">Paid</option> 
                              <option {{$data->status == 0 ? 'selected' : ''}} value="0">Due</option>                                                
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-form-label">Remark<span class="text-danger"> </span></label>
                              <textarea type="text" placeholder="Remark" name="remark" class="form-control">{{$data->remark}}</textarea>
                           </div>
                        </div>
                     </div>
                  </div> 
                  <div class="col-md-12"></div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Update </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection