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
        <h5 class="card-title">Single inquiry</h5>

        Message:
        <p>
            {!! $data->inquiry !!}
        </p>

        Reply:
        {!! $data->reply !!}
    </div>
</div>

@endsection