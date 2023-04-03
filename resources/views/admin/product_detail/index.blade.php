@extends('layouts.admin')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<a class="btn btn-success" href="{{route('admin.productdetail.add', $product->slug)}}" style="margin-bottom:20px;">Add new Detail</a>

<h3>Existing Details</h3>
@foreach ($product->productDetails as $detail)
<div class="card">
    <div class="card-body">  
        <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right; margin-bottom:20px;">
                <form action="{{route('admin.productdetail.delete')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$product->slug}}" name="slug">

                    <input type="hidden" value="{{$detail->id}}" name="id">
                    <button type="submit" class="btn btn-danger">X</button>
                </form>
            </div>
        <form class="row g-3" action="{{route('admin.productdetail.update')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{$product->slug}}" name="slug">

            <input type="hidden" value="{{$detail->id}}" name="id">

            
                    <div class="col-md-6">
                        <h5 class="card-title">Quantity</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="number" value="{{$detail->quantity}}" min="0" class="form-control" name="quantity" id="quantity">
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Color</h5>
                    </div>
                    <div class="col-md-6">
                        <select name="color" id="color" class="form-control">
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}" @if($color->id==$detail->color_id) selected @endif>{{$color->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title">Size</h5>
                    </div>
                    <div class="col-md-6">
                        <select name="size" id="size" class="form-control">
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}" @if($size->id==$detail->size_id) selected @endif>{{$size->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6"><button type="submit" class="btn btn-primary">Update</button></div>
            
        </form>
        </div>
        <div class="row">
            @foreach ($detail->images as $image)
            <div class="col-md-6">
                <form action="{{route('admin.productdetailimage.delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$image->id}}">
                    <input type="hidden" value="{{$product->slug}}" name="slug">
                    <button type="submit" class="btn btn-danger">X</button>
                </form>
                <img src="{{asset($image->image)}}" width="300px;" alt="">
            </div>
            @endforeach
        </div>
</div>
    </div>
</div>
@endforeach

<div class="card">
    <div class="card-body">  
        <h1 class="text-center">Add new Image</h1>
<form action="{{route('admin.productdetailimage.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="">
    <label for="id">Choose detail</label>
    <select name="id" id="id" class="form-control">
        @foreach ($product->productDetails as $detail)
            <option value="{{$detail->id}}">{{$detail->color->name}} | {{$detail->size->name}}</option>
        @endforeach
        <option value=""></option>
    </select>
    <input type="hidden" value="{{$product->slug}}" name="slug">
    <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="image">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
    <!--<div class="col-md-6">
        <input type="file" name="image" id="image">
    </div>-->
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>
</form>
    </div>
</div>


@endsection