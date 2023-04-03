@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
      @can('category_add')
        <a class="btn btn-success" href="{{route('admin.category.add')}}">Add new Category</a>
      @endcan
      <h5 class="card-title">All Categories</h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">slug</th>
            <th scope="col">Image</th>
            @can('category_edit')
            <th scope="col">Edit</th>
            @endcan
            @can('category_delete')
            <th scope="col">Delete</th>
            @endcan
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->content->title}}</th>
                <td>{{$category->content->slug}}</td>
                <td><img src="{{$category->content->cover_image}}" width="100px" alt=""></td>
                @can('category_edit')
                <td><a href="{{route('admin.category.edit', $category->content->slug)}}">Edit</a></td>
                @endcan
                @can('category_delete')
                <td><button type="button" onclick="delete_category('{{$category->content->slug}}')">Delete</button></td>
                @endcan()
            </tr>
            @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">
    function delete_category(slug){
      $.ajax({
          method: 'get',
          url: "/category/delete/"+slug,
          success: function(data)
          {
            jQuery.each(data.errors, function(key, value){
                    Command: toastr["error"]( value, "Message");
                });
                jQuery.each(data.success, function(key, value){
                    Command: toastr["success"]( value, "Message");
                });
          }
      });
    }
  </script>

@endsection