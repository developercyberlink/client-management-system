@extends('layouts.admin')

@section('content')

<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col">
            <h3 class="page-title">Tickets</h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
               <li class="breadcrumb-item active">Tickets</li>
            </ul>
         </div>
         <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>
         </div>
      </div>
   </div>
   <!-- /Page Header -->
   <div class="row">
      <div class="col-md-12">
         <div class="card-group m-b-30">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                     <div>
                        <span class="d-block">New Tickets</span>
                     </div>
                     <div>
                        <span class="text-success">+10%</span>
                     </div>
                  </div>
                  <h3 class="mb-3">112</h3>
                  <div class="progress mb-2" style="height: 5px;">
                     <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                     <div>
                        <span class="d-block">Solved Tickets</span>
                     </div>
                     <div>
                        <span class="text-success">+12.5%</span>
                     </div>
                  </div>
                  <h3 class="mb-3">70</h3>
                  <div class="progress mb-2" style="height: 5px;">
                     <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;"  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                     <div>
                        <span class="d-block">Open Tickets</span>
                     </div>
                     <div>
                        <span class="text-danger">-2.8%</span>
                     </div>
                  </div>
                  <h3 class="mb-3">100</h3>
                  <div class="progress mb-2" style="height: 5px;">
                     <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between mb-3">
                     <div>
                        <span class="d-block">Pending Tickets</span>
                     </div>
                     <div>
                        <span class="text-danger">-75%</span>
                     </div>
                  </div>
                  <h3 class="mb-3">125</h3>
                  <div class="progress mb-2" style="height: 5px;">
                     <div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Search Filter -->
   <div class="row filter-row">
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus select-focus">
            <select class="select floating">
               <option />Select Client
               <option />Muan Nepal
               <option />NBSM 
            </select>
            <label class="focus-label">Client </label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus select-focus">
            <select class="select floating">
               <option> -- Select -- </option>
               <option> Pending </option>
               <option> Approved </option>
               <option> Returned </option>
            </select>
            <label class="focus-label">Status</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus select-focus">
            <select class="select floating">
               <option> -- Select -- </option>
               <option> High </option>
               <option> Low </option>
               <option> Medium </option>
            </select>
            <label class="focus-label">Priority</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus">
            <div class="cal-icon">
               <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">From</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
         <div class="form-group form-focus">
            <div class="cal-icon">
               <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">To</label>
         </div>
      </div>
      <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
         <a href="#" class="btn btn-success btn-block"> Search </a>  
      </div>
   </div>
   <!-- /Search Filter -->
   <div class="row">
      <div class="col-md-12">
         <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Ticket Id</th>
                     <th>Ticket Title</th>
                     <th>Client</th>
                     <th>Created Date</th>
                     <th>Last Reply</th>
                     <th>Priority</th>
                     <th>Status</th>
                     <th class="text-right">Actions</th>
                  </tr>
               </thead>
               <tbody>
                 @foreach ($tasks as $task)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td><a href="{{route('admin.usertask.single', $task->id)}}">#TKT-{{$task->id}}</a></td>
                     <td>{{$task->title}}</td>
                     <td>
                        <h2 class="table-avatar"> 
                           <a href="view-client-details.php"><i class="la la-check-circle text-success mr-1"></i> </a>
                        </h2>
                     </td>
                     <td>{{$task->created_at}}</td>
                     <td>{{$task->updated_at}}</td>
                     <td>
                        <a class="btn btn-white btn-sm btn-rounded  " ><i class="fa fa-dot-circle-o text-danger"></i> High</a>
                     </td>
                     <td>
                    @if($task->task_id==null)
                    Not Assigned
                    @else
                    <a href="{{route('admin.task.manage', $task->task_id)}}">Assigned</a>
                    @endif
                  </td>
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{route('admin.usertask.feedback', $task->id)}}"><i class="fa fa-pencil m-r-5"></i> Reply</a>
                              <a class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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