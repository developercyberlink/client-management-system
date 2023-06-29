@extends('layouts.admin')

@section('content')

<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
       <div class="row align-items-center">
          <div class="col">
             <h3 class="page-title">Drafts </h3>
             <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard </a></li>
                <li class="breadcrumb-item active">Drafts </li>
             </ul>
          </div>
          <div class="col-auto float-right ml-auto">
             {{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client"><i class="fa fa-plus"></i> Add Client </a> --}}
              <div class="view-icons">
               
                {{-- <a href="clients-list.php" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a> --}}
                 <!-- <a href="clients.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> -->
                </div>
          </div>
       </div>
    </div>
    <!-- /Page Header -->
    <!-- Search Filter ch Filter -->
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
                  @foreach($user as $row)
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
                          <a class="btn btn-white btn-sm btn-rounded"><i class="fa fa-dot-circle-o text-{{($row->status == 1)?'success':'danger'}}"></i> {{($row->status == 1)?'Active':'Inactive'}}</a>
                        </div>
                     </td>
                     <td class="text-right">
                        <div class="dropdown dropdown-action">
                           <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert </i></a>
                           <div class="dropdown-menu dropdown-menu-right">                              
                             <a class="dropdown-item" href="{{route('admin.clients.destroy', $row->id)}}" onclick="return confirm('Are you sure you want to delete this? If you want to delete the cilent it will result in deleting all the invoices and services taken by the client.')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                              {{-- <a href="{{route('admin.clients.updateDraft', $row->id)}}" class="dropdown-item" onclick="return confirm('Are you sure you want to send the client to draft')">Send to draft</a> --}}
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

@endsection