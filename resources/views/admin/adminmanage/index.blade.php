@extends('layouts.admin')
@section('content')

<div class="content container-fluid">        
  <!-- Page Header -->
  <div class="page-header">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="page-title">Employee</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Employee</li>
        </ul>
      </div>
      <div class="col-auto float-right ml-auto">
          @can('admin_manage_add')
          <a href="{{route('admin.adminmanage.add')}}" class="btn add-btn" ><i class="fa fa-plus"></i> Add Employee</a>
          @endcan
        
        <div class="view-icons">          
          <a href="{{route('admin.adminmanage.index')}}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
          <!-- <a href="employees.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a> -->
        </div>
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
              <th>Name</th>
              <th>Role</th>
              <th>Email</th>
              <th>Mobile</th>   
              <th>Status</th> 
               @can('admin_manage_edit'||'admin_manage_delete')             
              <th class="text-right no-sort">Action</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach ($admins as $admin)
             <tr class="id{{$admin->id}}">
              <td>
                <h2 class="table-avatar">
                  <a href="{{route('admin.adminmanage.view', $admin->id)}}" class="avatar">
                     @if($admin->image)
                      <img src="{{url('uploads/admin-image/'.$admin->image)}}" alt="{{$admin->name}}">
                      @else
                      <img src="{{asset('admin-assets/img/user.jpg')}}" alt="{{$admin->name}}">
                      @endif                   
                  </a>
                  <a href="{{route('admin.adminmanage.view', $admin->id)}}">{{$admin->name}} <span>{{$admin->designation }}</span></a>
                </h2>
              </td>
              <td>{{$admin->getRoleNames()[0]}}</td>
              <td>{{$admin->email}}</td>
              <td>{{$admin->mobile}}</td> 
               <td class="text-center">
                 <div class="action-label">
                   <a class="btn btn-white btn-sm btn-rounded  "  ><i class="fa fa-dot-circle-o text-{{($admin->status == 1)?'success':'danger'}}"></i> {{($admin->status == 1)?'Active':'Inactive'}}</a>
                </div>
                </td>         
               @can('admin_manage_edit'||'admin_manage_delete')
              <td class="text-right">                        
                <div class="dropdown dropdown-action">
                  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                  <div class="dropdown-menu dropdown-menu-right">
                    @can('admin_manage_edit')
                    <a class="dropdown-item" href="{{route('admin.adminmanage.edit', $admin->id)}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    @endcan
                      @can('admin_manage_delete')
                    <a class="dropdown-item" href="{{route('admin.adminmanage.destroy', $admin->id)}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    @endcan
                  </div>
                </div>                       
              </td>
               @endcan
            </tr>
             @endforeach                   
             
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 <div class="card">
    <div class="card-body">
        <h5 class="card-title">Manage roles and permissions</h5>

        @foreach ($roles as $role)

            <h3>{{$role->name}}</h3>

            <div class="row">
              @foreach ($permissions as $permission)
              <div class="col-md-3">
                <input type="checkbox" id="{{$permission->name}}_{{$role->name}}" 
                  @if($role->hasPermissionTo($permission)) checked @endif 
                  @if($role->name=="Super Admin") disabled="disabled" checked @endif 
                  name="{{$permission->name}}" value="{{$permission->name}}" onclick="updatePermission('{{$permission->name}}', '{{$role->name}}')">
                <label for="{{$permission->name}}"> {{$permission->name}}</label>
              </div>
              @endforeach
            </div>

        @endforeach

    </div>
  </div>
<!-- /Page Content -->
        
@endsection

@section('script')
<script>
  function updatePermission(permission_name, role_name){
    let checked = $("#"+permission_name+"_"+role_name).is(':checked');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
          method: 'post',
          url: "{{route('admin.adminmanage.modifypermission')}}",
          data: {"permission":permission_name, "role":role_name, "checked":checked},
          statusCode: {
            403: function (response) {
              toastr["error"]("You don't have access to this feature");
            },
          },
          success: function(data)
          {
            jQuery.each(data.errors, function(key, value){
                  toastr.error (value.message);
              });
              jQuery.each(data.success, function(key, value){
                // alert('here');
                Command: toastr["success"]( value, "Message");
              });
          }
          });

  }
</script>
  
@endsection
