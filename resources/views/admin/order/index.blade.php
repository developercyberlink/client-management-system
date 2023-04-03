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
            <a href="#" class="btn add-btn"><i class="fa fa-plus"></i> Add Order </a>             
         </div> 
      </div>
   </div>
   <!-- /Page Header -->
    
   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
               <thead>
                  <tr>
                     <th>Sn. </th>
                     <th>Order ID </th>
                     <th>Services</th>
                     <th>Company  </th>
                     <th>Email </th>
                     <th>Contact no. </th>
                     <th>Payment Status </th>
                     <th class="text-right">Action </th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($data as $row)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td><a href="{{route('admin.order.single', $row->id)}}">ORDER-{{$row->id}}</a> </td>
                     <td><span class="d-block">{{$row->service->title}}   </span>
                        <span class="text-blue">Bank &amp; Finance</span>
                     </td>
                     <td>Mega Bank Nepal <br><small> Contact Person : {{$row->user->name}} </small></td>
                     <td>{{$row->user->email}} </td>
                     <td>9851075355 </td>
                     <td>
                        <div class="action-label">
                           <a class="btn btn-white btn-sm btn-rounded  "  ><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                        </div>
                     </td>
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert </i></a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a href="" class="dropdown-item"><i class="fa fa-copy m-r-5"></i> Copy to Client</a>                             
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete </a>
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
@endsection