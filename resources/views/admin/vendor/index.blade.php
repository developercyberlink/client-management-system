@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
      @can('vendor_add')
        <a class="btn btn-success" href="{{route('admin.vendor.add')}}">Add new Vendor</a>
      @endcan
      <h5 class="card-title">All Vendors</h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">PAN</th>
            @can('vendor_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('vendor_delete')
            <th scope="col">Delete</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
            <tr>
                <th scope="row">{{$vendor->name}}</th>
                <td>{{$vendor->pan}}</td>
                @can('vendor_edit')
                <td><a href="{{route('admin.vendor.edit', $vendor->pan)}}">Edit</a></td>
                @endcan
                @can('vendor_delete')
                <td><a href="{{route('admin.vendor.delete', $vendor->pan)}}">Delete</a></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>
@endsection