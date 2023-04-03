@extends('layouts.admin')

@section('content')

<!-- Page Content -->
<div class="content container-fluid">
   <!-- Page Header -->
   <div class="page-header">
      <div class="row align-items-center">
         <div class="col">
            <h3 class="page-title">Assign Tasks</h3>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
               <li class="breadcrumb-item active">Assign Tasks</li>
            </ul>
         </div>
         <div class="col-auto float-right ml-auto">
            <a href="{{route('admin.task.add')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Task</a>
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
  
   <div class="row">
      <div class="col-md-12">
         <div class="card">
              <div class="card-header d-flex p-0">
                <!-- <h3 class="card-title p-3">Manage Trips</h3> -->
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab"> All Tasks</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Assigned Task</a></li>                 
                                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                     <div class="tab-pane active" id="tab_1">
                  <!--General tab starts -->                   
                   <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
               <thead>
                  <tr>
                     <th>SN</th>
                     <th>Task Title</th>
                     <th>Deadline</th>
                     <th>Assigned By</th>
                     <th>Created Date</th>
                     <th>Last Reply</th>
                     <th>Priority</th>                     
                  </tr>
               </thead>
               <tbody>
                  @foreach ($admin->givenTasks as $task)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td><a href="{{route('admin.task.manage', $task->id)}}">{{$task->title}}</a></td>
                     <td>{{$task->deadline}}</td>
                     <td>
                        <h2 class="table-avatar"> 
                           <a href="view-client-details.php"><i class="la la-check-circle text-success mr-1"></i> {{$task->givenBy->name}}</a>
                        </h2>
                     </td>
                     <td>{{$task->created_at}}</td>
                     <td>{{$task->updated_at}}</td>
                     <td>
                        <a class="btn btn-white btn-sm btn-rounded  " ><i class="fa fa-dot-circle-o text-{{$task->priority_id == 1?'secondary':''}}{{$task->priority_id == 2?'warning':''}}{{$task->priority_id == 3?'danger':''}}"></i> {{$task->priority->title}}</a>
                     </td>                    
                  </tr>
                    @endforeach
               
               </tbody>
            </table>
         </div>
                   <!--//-->
                  </div>
                  <!-- /.tab-pane general -->
                  <div class="tab-pane" id="tab_2">
                  <table class="table table-striped custom-table mb-0 datatable">
               <thead>
                  <tr>
                     <th>SN</th>
                     <th>Task Title</th>
                     <th>Deadline</th>
                     <th>Assigned By</th>
                     <th>Created Date</th>
                     <th>Last Reply</th>
                     <th>Priority</th>                     
                  </tr>
               </thead>
               <tbody>
                   @foreach ($admin->tasks as $task)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td><a href="{{route('admin.task.updatestatus', $task->id)}}">{{$task->title}}</a></td>
                     <td>{{$task->deadline}}</td>
                     <td>
                        <h2 class="table-avatar"> 
                           <a href="view-client-details.php"><i class="la la-check-circle text-success mr-1"></i> {{$task->givenBy->name}}</a>
                        </h2>
                     </td>
                     <td>{{$task->created_at}}</td>
                     <td>{{$task->updated_at}}</td>
                     <td>
                        <a class="btn btn-white btn-sm btn-rounded  " ><i class="fa fa-dot-circle-o text-{{$task->priority_id == 1?'secondary':''}}{{$task->priority_id == 2?'warning':''}}{{$task->priority_id == 3?'danger':''}}"></i> {{$task->priority->title}}</a>
                     </td>                    
                  </tr>
                    @endforeach
               
               </tbody>
            </table>
                  </div>
               
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->

       
      </div>
   </div>
</div>
<!-- /Page Content -->

@endsection