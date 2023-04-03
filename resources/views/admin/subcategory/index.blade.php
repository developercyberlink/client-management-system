@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
      @can('sub_category_add')
        <a class="btn btn-success" href="{{route('admin.subcategory.add')}}">Add new Sub Category</a>
      @endcan
      <h5 class="card-title">All Categories</h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">slug</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            @can('sub_category_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('sub_category_delete')
            <th scope="col">Delete</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
            <tr>
                <th scope="row">{{$subcategory->content->title}}</th>
                <td>{{$subcategory->content->slug}}</td>
                <td><img src="{{$subcategory->content->cover_image}}" width="100px" alt=""></td>
                <td>{{$subcategory->category->content->title}}</td>
                @can('sub_category_edit')
                <td><a href="{{route('admin.subcategory.edit', $subcategory->content->slug)}}">Edit</a></td>
                @endcan
                @can('sub_category_delete')
                <td><a href="{{route('admin.subcategory.delete', $subcategory->content->slug)}}">Delete</a></td>
                @endcan
            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>
@endsection