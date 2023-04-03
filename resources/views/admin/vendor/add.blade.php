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

      <h5 class="card-title">Add new Vendor</h5>

      <!-- Vertical Form -->
      <form class="row g-3" action="{{route('admin.vendor.create')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="col-12">
          <label for="pan" class="form-label">PAN</label>
          <input type="number" class="form-control" name="pan" id="pan">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>

@endsection