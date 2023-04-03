@extends('layouts.admin')

@section('content')
<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col">
            <h3 class="page-title">Programming Type</h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard </a></li>
               <li class="breadcrumb-item active">Programming Type</li>
            </ul>
         </div>
          <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#addservice"><i class="fa fa-plus"></i> Add Order </a>             
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
                     <th>Programming Type</th>                     
                     <th class="text-right">Action </th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($data as $row)
                  <tr>
                     <td>{{$loop->iteration}}</td>                     
                     <td><span class="d-block">{{$row->title}}   </span></td>                   
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert </i></a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('admin.programming-type.edit', $row->id)}}" class="dropdown-item"><i class="fa fa-copy m-r-5"></i> Rename</a>                             
                              <a class="dropdown-item" href="{{route('admin.programming-type.destroy', $row->id)}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o m-r-5"></i> Delete </a>
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
<!-- Add Programming Modal -->
<div id="addservice" class="modal custom-modal fade" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Programming  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
         </div>
         <div class="modal-body">
           <form method="POST" action="{{route('admin.programming-type.store')}}">
            @csrf
               <div class="row">
                  <div class="col-md-8 offset-2">
                     <div class="row">
                        <!--  -->
                        <div class="col-md-12">
                           <div class="form-group">                               
                              <label class="col-form-label">Programming <span class="text-danger">* </span></label>
                              <input type="text" class="form-control" placeholder="Enter Programming" name="title">
                           </div>
                        </div>
                        <!--  -->                       
                     </div>
                  </div>
               </div>
               <div class="submit-section">
                  <button class="btn btn-primary submit-btn">Create </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /Add Programming Modal -->
@endsection