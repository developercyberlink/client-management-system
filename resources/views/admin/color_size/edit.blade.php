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

      <h5 class="card-title">Edit Information</h5>

      <!-- Vertical Form -->
      <form class="row g-3" action="{{route('admin.colorsize.update')}}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{$colorsize->id}}">

        <div class="col-12">
          <label for="title" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="{{$colorsize->name}}" id="name">
        </div>
        <div class="col-12">
            <label for="title" class="form-label">Type</label>
            <select name="type" class="form-control" id="type">
                <option value="0" @if($colorsize->type==0) selected @endif>Color</option>
                <option value="1" @if($colorsize->type==1) selected @endif>Size</option>
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