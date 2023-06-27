@extends('layouts.admin')

@section('content')
<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col">
            <h3 class="page-title">Orders </h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Dashboard </a></li>
               <li class="breadcrumb-item active">Orders </li>
            </ul>
         </div>
          <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#addOrder"><i class="fa fa-plus"></i> Add Order </a>             
         </div> 
      </div>
   </div>
   <!-- /Page Header -->
    
   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table id="myTable" class="table table-striped custom-table datatable">
               <thead>
                  <tr>
                     <th>Sn. </th>
                     <th>Order ID </th>
                     <th>Services</th>
                     <th>Company  </th>
                     <th>Email </th>
                     <th>Contact no. </th>
                     <th>Status </th>
                     <th class="text-right">Action </th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($data as $row)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td><a href="{{route('admin.order.single', $row->id)}}">{{$row->order_id}}</a> </td>
                     <td><span class="d-block">{{$row->service->title}}</span>
                     </td>
                     <td>{{$row->company}} <br><small> Contact Person : {{$row->contact_person}} </small></td>
                     <td>{{$row->email}} </td>
                     <td>{{$row->contact_no}} </td>
                     <td>
                        <div class="action-label">
                           <a class="btn btn-white btn-sm btn-rounded"><i class="fa fa-dot-circle-o text-{{($row->status == 1) || ($row->status == 4) ?'success':'danger'}}"></i> @if($row->status == 1)Paid @elseif($row->status == 0)Due @elseif($row->status == 2)Pending @elseif($row->status == 3)Cancelled @elseif($row->status == 4) New @endif</a>
                        </div>
                     </td>
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert </i></a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('admin.order.single', $row->id)}}" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                              <a href="#" class="dropdown-item getDataButton" data-name="{{ $row->company }}" data-email="{{ $row->email }}" data-toggle="modal" data-target="#addClient"><i class="fa fa-copy m-r-5"></i> Add to Client</a>                             
                              <a class="dropdown-item" href="{{route('admin.order.delete', $row->id)}}"><i class="fa fa-trash-o m-r-5"></i> Delete </a>
                           </div>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /Page Content -->
<!-- Add Order Modal -->
<div id="addOrder" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Order  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{route('admin.order.create')}}">
            @csrf
            <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                     <input type="hidden" name="addByAdmin" value="Y">
                        <label class="col-form-label">Services  <span class="text-danger">* </span></label>
                        <select  class="form-control select serviceselect" name="service">
                           <option value="">Select Service </option>
                           @if($service->count()>0)
                           @foreach($service as $row)
                           <option value="{{$row->id}}" id = "option_{{$row->id}}">{{$row->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Client/Company  <span class="text-danger">* </span></label>
                        <select id="options" class="form-control select" name="client">
                           <option value="">Select Client </option>
                           @if($client->count()>0)
                           @foreach($client as $row)
                           <option value="{{$row->id}}" id = "option_{{$row->id}}">{{$row->name}}</option>
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
                              <input type="text" class="form-control" placeholder="Enter Email" value="{{old('email')}}" name="email">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">                               
                              <label class="col-form-label">Contact Person <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Enter Contact Person Name" value="{{old('contactName')}}" name="contactName">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">                               
                              <label class="col-form-label">Contact Number </span></label>
                              <input type="text" class="form-control" placeholder="Enter Contact Number" value="{{old('contactNo')}}" name="contactNo">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="col-form-label">Price </span></label>
                              <input type="text" placeholder="Price" name="price"  value="{{old('price')}}" class="form-control">
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <h5 class="clearfix">Status</h5>
                              <select class="select" name="status">
                              <option value="4">New</option> 
                              <option value="1">Paid</option> 
                              <option value="0">Due</option> 
                              <option value="2">Pending</option>
                              <option value="3">Cancle</option>                                      
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-form-label">Remark<span class="text-danger"> </span></label>
                              <textarea type="text" placeholder="Remark" name="remark" value="{{old('remark')}}" class="form-control">{{old('remark')}}</textarea>
                           </div>
                        </div>
                     </div>
                  </div> 
                  <div class="col-md-12"></div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Create </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /Add Order Modal -->
<!-- Add Client Modal -->
<div id="addClient" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Client </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
             <form id="myForm" method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                @csrf
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Client Name  <span class="text-danger">* </span></label>
                        <input class="form-control"  type="text" name="name" placeholder="Name"/>
                     </div>
                  </div>                 
            
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Email  <span class="text-danger">* </span></label>
                        <input class="form-control floating" type="email" name="email" placeholder="Email"/>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Password <span class="text-danger">* </span></label>
                        <div class="input-group mb-3">
                           <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                     </div>
                  </div>  
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Add </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /Add Client Modal -->

<!-- Populate Client Form -->
<script>
   var buttons = document.getElementsByClassName("getDataButton");
   for (var i = 0; i < buttons.length; i++) {
      buttons[i].addEventListener("click", function(event) {
         var name = event.target.dataset.name;
         var email = event.target.dataset.email;
         // console.log("Name: " + name);
      //    var formData = {
      //    name: name,
      //    email: email
      // };
      function populateForm() {
         var form = document.getElementById("myForm");
         form.name.value = name;
         form.email.value = email;
      }
      populateForm();
      });
   }
</script>
<!-- Populate Client Form -->

@endsection