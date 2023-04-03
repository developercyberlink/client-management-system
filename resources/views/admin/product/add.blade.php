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

      <h5 class="card-title">Add new Product</h5>

      <!-- Vertical Form -->
      <form class="row g-3" action="{{route('admin.product.create')}}" method="POST">
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
          <label for="tags" class="form-label">Tags</label>
          <input type="text" class="form-control" name="tags" id="tags">
        </div>
        <div class="col-12">
            <label for="introduction" class="form-label">Introduction</label>
            <textarea class="tinymce-editor" id="introduction" name="introduction">
            </textarea>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="tinymce-editor" id="description" name="description">
            </textarea>
        </div>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose Cover Image
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="cover_image">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
        <div class="col-12">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>
        <div class="col-12">
            <label for="discounted_price" class="form-label">Discounted Price</label>
            <input type="number" class="form-control" name="discounted_price" id="discounted_price">
        </div>
        <div class="col-12">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" class="form-control" name="sku" id="sku">
        </div>
        <div class="col-12">
            <label for="subcategory" class="form-label">Sub Category</label> <br>
            @foreach($subcategories as $subcategory)
                <input type="checkbox" name="subcategory[]" value="{{$subcategory->id}}"> <label>{{$subcategory->content->title}}</label>
            @endforeach
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection