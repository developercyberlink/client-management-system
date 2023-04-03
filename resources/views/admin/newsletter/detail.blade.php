@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        
        <h5 class="card-title">Detail of {{$data->title}}</h5>

        <ul class="list-group">
            <li class="list-group-item">Created at: {{$data->created_at}}</li>
            <li class="list-group-item">Template: {{$data->template}}</li>
        </ul>

        <h5 class="mt-5">Content: </h5>
        {!! $data->content !!}

        <h5 class="mt-5">Users reached: </h5>
        <ul class="list-group">
            @foreach($data->users as $row)
            <li class="list-group-item">{{$row->name}} ({{$row->email}})</li>
            @endforeach
        </ul>

    </div>
</div>
@endsection