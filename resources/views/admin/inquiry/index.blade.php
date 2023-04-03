@extends('layouts.admin')

@section('content')

    
<div class="card">
    <div class="card-body">

      <h5 class="card-title">Inquiry Section</h5>

      <table class="table table-hover" id="dataTable">
        
        <thead>
          <tr>
            <th>Service</th>
            <th>Client</th>
            <th>View</th>
            <th>Replied?</th>
            <th>Mark as order</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach($data as $row)
            <tr>
              <td>{{$row->service->title}}</td>
              <td>{{$row->user->name}}</td>
              <td><a href="{{route('admin.inquiry.single', $row->id)}}">View</a></td>
              <td>
                @if($row->reply)
                Yes
                @else
                No
                @endif
              </td>
              <td><a href="{{route('admin.inquiry.markorder', $row->id)}}">Mark Order</a></td>
            </tr>
          @endforeach
        </tbody>

      </table>

    </div>

</div>

@endsection