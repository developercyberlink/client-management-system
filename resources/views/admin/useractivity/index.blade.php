@extends('layouts.admin')

@section('content')

<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col">
            <h3 class="page-title">Clients </h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard </a></li>
               <li class="breadcrumb-item active">Clients </li>
            </ul>
         </div>
         <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Client </a>
             <div class="view-icons">
              
               <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                <!-- <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> -->
               </div>
         </div>
      </div>
   </div>
   <!-- /Page Header -->
   <!-- Search Filter -->
   <div class="row filter-row">
      <div class="col-sm-6 col-md-3">
         <div class="form-group form-focus">
            <input type="text" class="form-control floating" />
            <label class="focus-label">Client ID </label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="form-group form-focus">
            <input type="text" class="form-control floating" />
            <label class="focus-label">Contact Person  </label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="form-group form-focus select-focus">
            <select class="select floating">
               <option />Select Client
               <option />Muan Nepal
               <option />NBSM 
            </select>
            <label class="focus-label">Client </label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">  
         <a href="#" class="btn btn-success btn-block"> Search  </a>  
      </div>
   </div>
   <!-- Search Filter -->
   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
               <thead>
                  <tr>
                     <th>Name </th>
                     <th>Client ID </th>                     
                     <th>Email </th>                     
                     <th>Status </th>
                     <th class="text-right">Action </th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($data as $row)
                  <tr>
                     <td>
                        <h2 class="table-avatar">
                           <a href="{{route('admin.clients.details', $row->id)}}" class="avatar">
                           @if($row->image)
                            <img src="{{url('uploads/user-image/'.$row->image)}}" alt="{{$row->name}}">
                            @else
                            <img src="{{asset('admin-assets/img/user.jpg')}}" alt="{{$row->name}}">
                            @endif 
                           </a>
                           <a href="{{route('admin.clients.details', $row->id)}}"> {{$row->name}} </a>
                        </h2>
                     </td>
                     <td>CPL-{{$row->id}} </td>                    
                     <td>{{$row->email}} </td>                    
                     <td>
                        <div class="action-label">
                          <a class="btn btn-white btn-sm btn-rounded  "  ><i class="fa fa-dot-circle-o text-{{($row->status == 1)?'success':'danger'}}"></i> {{($row->status == 1)?'Active':'Inactive'}}</a>
                        </div>
                     </td>
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert </i></a>
                           <div class="dropdown-menu dropdown-menu-right">                              
                             <a class="dropdown-item" href="{{route('admin.clients.destroy', $row->id)}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
<!-- Add Client Modal -->
<div id="add_client" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Client </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
             <form method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">
                @csrf
               <div class="row">
                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Client Name  <span class="text-danger">* </span></label>
                        <input class="form-control" type="text" name="name"/>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label"> Image  <span class="text-danger">* </span></label>
                        <input class="form-control" type="file" name="image"/>
                     </div>
                  </div>                  
                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Email/Username  <span class="text-danger">* </span></label>
                        <input class="form-control floating" type="email" name="email"/>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="col-form-label">Password <span class="text-danger">* </span></label>
                        <div class="input-group mb-3">
                           <input type="password" class="form-control" placeholder="Password" name="password">
                           <!-- <div class="input-group-append">
                              <button class="btn btn-white" type="button">Generate</button>
                           </div> -->
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
@endsection