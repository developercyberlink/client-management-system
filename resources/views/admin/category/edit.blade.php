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

      <h5 class="card-title">Edit a Category</h5>

      <!-- Vertical Form -->
      <form class="row g-3" action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{$category->id}}">

        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" onchange="generateSlug()" class="form-control" value="{{$category->title}}" name="title" id="title">
        </div>
        <div class="col-12">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control" value="{{$category->slug}}" name="slug" id="slug">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="tinymce-editor" id="description" name="description">
                {{$category->description}}
            </textarea>
        </div>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" value="{{$category->cover_image}}" type="text" name="cover_image">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
        <!--<div class="col-12">
            <img src="{{asset($category->cover_image)}}" width="100px" alt=""> <br>
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