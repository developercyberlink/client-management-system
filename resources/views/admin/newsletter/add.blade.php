@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        
        <h5 class="card-title">New Newsletter</h5>

        <form id="content_form">
        <div class="container">
            <div class="row">
                
                    <div class="col-md-8">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Title" class="form-control">

                        <label for="content">Content</label>
                        <textarea name="content" class="form-control tinymce-editor">

                        </textarea>

                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-success form-control" value="Send">

                        <div class="mt-4">
                            <label for="template">Template</label>
                            <select name="template" id="template" class="form-control">
                                @foreach($templates as $template)
                                    <option value="{{explode('.', $template)[0]}}">{{ ucfirst(explode('.', $template)[0]) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <p><a href="#" id="select_all">Select all | <a href="#" id="select_none">Select none</a></a></p>
                            @foreach($users as $user)
                            <input type="checkbox" id="id-{{$user->id}}" class="user-checkbox" name="users[]" value="{{$user->id}}">
                            <label for="{{$user->email}}">{{$user->name}}</label>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
        </form>

    </div>
</div>

@endsection

@section('script')

<script>

$("#content_form").submit(function(e){
    e.preventDefault();

    let form = document.getElementById('content_form');
    let formData = new FormData(form);

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
          url: "{{route('admin.newsletter.send')}}",
          data: formData,
          success: function(data)
          {
            if(data.status=="success"){
                toastr.success(data.message);
                $("#content_form")[0].reset();
            }else{
                data.errors.map(function(error){
                    toastr.error(error);
                });
            }
          }
      });
});

$("#select_all").click(function(e){
    e.preventDefault();
    let boxes = $(".user-checkbox");

    boxes.map(function(index, box){
        let id = String(box["id"]);
        $("#"+id ).prop("checked",true);
    });
});

$("#select_none").click(function(e){
    e.preventDefault();
    let boxes = $(".user-checkbox");

    boxes.map(function(index, box){
        let id = String(box["id"]);
        $("#"+id ).prop("checked",false);
    });
});

</script>

@endsection