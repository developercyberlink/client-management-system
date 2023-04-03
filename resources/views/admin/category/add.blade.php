@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

      <h5 class="card-title">Add new Category</h5>

      <!-- Vertical Form -->
      <form class="row g-3" id="category_form"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" onchange="generateSlug()" class="form-control" name="title" id="title">
        </div>
        <div class="col-12">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control" name="slug" id="slug">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="tinymce-editor" id="description" name="description">
            </textarea>
        </div>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="cover_image">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
        <!--<div class="col-12"> 
            <label for="cover_image">Cover Image:</label>
            <input type="file" name="cover_image" id="cover_image">
        </div>-->
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection

@section('script')

  <script type="text/javascript">
  $(document).ready(function()
  {
    $("form").on('submit',function(e){
      e.preventDefault();

      let form = document.getElementById('category_form');
      let form_data = new FormData(form);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
      method: 'post',
       processData: false,
       contentType: false,
       cache: false,
        enctype: 'multipart/form-data',
          url: "{{route('admin.category.create')}}",
          data: form_data,
          success: function(data)
          {
            jQuery.each(data.errors, function(key, value){
                    Command: toastr["error"]( value, "Message");
                });
                jQuery.each(data.success, function(key, value){
                    Command: toastr["success"]( value, "Message");
                    $("#category_form")[0].reset();
                });
          }
      });
    });
  });
   
  </script>

@endsection