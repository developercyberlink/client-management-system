@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        
        <h5 class="card-title">Newsletter History</h5>

        @can('newsletter_add')
            <a class="btn btn-success" href="{{route('admin.newsletter.add')}}">Add new Newsletter</a>
        @endcan


        <table class="table table-hover" id="dataTable">

            <thead>
                <tr>
                    <td>Title</td>
                    <td>Template</td>
                    <td>Created at</td>
                    <td>Detail</td>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{$row->title}}</td>
                    <td>{{ucfirst($row->template)}}</td>
                    <td>{{$row->created_at}}</td>
                    <td><a href="{{route('admin.newsletter.detail', $row->id)}}">Detail</a></td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection