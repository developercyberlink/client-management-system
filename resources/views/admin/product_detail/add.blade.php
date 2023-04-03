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

<div class="card">
    <div class="card-body">

      <h5 class="card-title">Add new Product Detail of {{$product->title}}</h5>

      <!-- Vertical Form -->
      <form class="row g-3" id="detail_form" method="POST">
        @csrf

        <input type="hidden" value="{{$product->id}}" name="product_id">

        <div class="col-12">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" class="form-control" name="quantity" id="quantity">
        </div>
        <div class="col-12">
          <label for="color" class="form-label">Color</label>
          <select name="color" id="color" class="form-control">
          @foreach ($colors as $color)
              <option value="{{$color->id}}">{{$color->name}}</option>
          @endforeach
        </select>
        </div>
        <div class="col-12">
            <label for="size" class="form-label">Size</label>
            <select name="size" id="size" class="form-control">
                @foreach ($sizes as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                @endforeach
            </select>
        </div>
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

      let form = document.getElementById('detail_form');
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
          url: "{{route('admin.productdetail.create')}}",
          data: form_data,
          success: function(data)
          {
            jQuery.each(data.errors, function(key, value){
                    Command: toastr["error"]( value, "Message");
                });
                jQuery.each(data.success, function(key, value){
                    Command: toastr["success"]( value, "Message");
                    $("#detail_form")[0].reset();
                });
          }
      });
    });
  });
   
  </script>

  @endsection