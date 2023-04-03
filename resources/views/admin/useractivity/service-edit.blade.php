@extends('layouts.admin')

@section('content')
<div class="content container-fluid">
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
                <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.clients.details',$data->client_id)}}"><i class="la la-angle-left"></i> Back </a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="row">
      <div class="col-md-12"> 

          <form method="POST" action="{{ route('admin.clients.serviceupdate') }}" enctype="multipart/form-data">
            @csrf                               
           <div class="row">                                    
             <div class="col-md-6">
               <div class="form-group">
                  <input type="hidden" name="id" value="{{$data->id}}">
                  <label class="col-form-label">Domain<span class="text-danger">* </span></label>
                  <input type="text" name="domain" class="form-control" value="{{$data->domain}}">
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label class="col-form-label">Price<span class="text-danger">* </span></label>
                  <input type="text" name="price" class="form-control" value="{{$data->price}}">
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label class="col-form-label">Services Type  <span class="text-danger">* </span></label>
                  <select class="form-control select" name="service_type">
                     <option value="0">Select Service Type</option>
                     @if($servicetype->count()>0)
                     @foreach($servicetype as $row)
                     <option value="{{$row->id}}" {{($data->service_type == $row->id)?'selected':''}}>{{$row->title}}</option>
                     @endforeach
                     @endif
                  </select>
               </div>
            </div>
            
            <div class="col-md-6">
               <div class="form-group">
                  <label class="col-form-label">Programming Type <span class="text-danger">* </span></label>
                  <select class="form-control select" name="programming_type">
                     <option value="0">Select Programming </option>
                     @if($programming->count()>0)
                     @foreach($programming as $row)
                     <option value="{{$row->id}}" {{($data->programming_type == $row->id)?'selected':''}}>{{$row->title}}</option>
                     @endforeach
                     @endif
                  </select>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label>Registered on <span class="text-danger">*</span></label>
                  <div class="cal-icon">
                     <input class="form-control datetimepicker" type="text" placeholder="Date" name="registered" value="{{$data->registered}}">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label>Expiring on <span class="text-danger">*</span></label>
                  <div class="cal-icon">
                     <input class="form-control datetimepicker" type="text" placeholder="Date" name="expiring" value="{{$data->expiring}}">
                  </div>
               </div>
            </div>
                       
             <div class="col-md-6">
                <div class="form-group">
                    <label>Status </label>
                    <select class="select" name="status">
                    <option value="1" {{$data->status == 1?'selected':''}}>Paid</option> 
                    <option value="0" {{$data->status == 0?'selected':''}}>Due</option>                                                
                    </select>
                </div>
            </div>
        </div>
                     
            <div class="submit-section">
                <button class="btn btn-primary submit-btn" type="submit">Submit</button>
            </div>
        </form>                     
        </div>
    </div>
</div>
@endsection