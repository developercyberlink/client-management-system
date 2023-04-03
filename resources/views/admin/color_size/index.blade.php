@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
      @can('color_size_add')
        <a class="btn btn-success" href="{{route('admin.colorsize.add')}}">Add new Information</a>
        @endcan
      <h5 class="card-title">All Color and size information</h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            @can('color_size_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('color_size_delete')
            <th scope="col">Delete</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ($colorsizes as $colorsize)
            <tr>
                <th scope="row">{{$colorsize->name}}</th>
                <td>@if($colorsize->type==0) Color @else Size @endif</td>
                @can('color_size_edit')
                <td><a href="{{route('admin.colorsize.edit', $colorsize->name)}}">Edit</a></td>
                @endcan
                @can('color_size_delete')
                <td><a href="{{route('admin.colorsize.delete', $colorsize->name)}}">Delete</a></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>
@endsection