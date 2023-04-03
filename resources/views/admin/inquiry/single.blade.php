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
        <form method="POST" action="{{route('admin.inquiry.reply')}}">
            @csrf

            <input type="hidden" value="{{$data->id}}" name="id">

            <textarea class="form-control mt-3" name="reply" id="reply">
                {!! $data->reply !!}
            </textarea>

            <input type="submit" class="btn btn-primary mt-2" value="Send">
        </form>
    </div>
</div>

@endsection