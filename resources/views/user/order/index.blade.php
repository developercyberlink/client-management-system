@extends('layouts.user')

@section('content')

<h3 class="text-center">Order</h3>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
              @if($orders->count()>0)
                @foreach($orders as $row)
                <tr>
                    <td>{{$row->service->title}}</td>
                    <td><a><i class="fa fa-dot-circle-o text-{{($row->status == 1)?'success':'danger'}}"></i> @if($row->status == 1)Paid @elseif($row->status == 0)Due @elseif($row->status == 2)Pending @elseif($row->status == 3)Cancelled @elseif($row->status == 4) New @endif</a>
                    <form method="POST" action="{{route('user.order.orderStatus')}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$row->id}}">
                    @if(($row->status != 3) && ($row->status != 0) && ($row->status != 1))<button class="btn btn-secondary">Cancle</button>@endif
                    </form>
                    </td>
                </tr>
                
                @endforeach
                @endif
            </tbody>
        </table>

<div class="card" style="margin-top:50px;">
    <div class="card-body">

        <h5 class="card-title">Create New Order</h5>

        <form class="row g-3" action="{{route('user.order.create')}}" method="POST">
            @csrf
            <div class="col-12">
            <input type="hidden" name="addByAdmin" value="N">
            <input type="hidden" name="userId" value="{{Auth::id()}}">
              <label for="service" class="form-label">Select a service</label>
              <select name="service" id="service" class="form-control">
                @foreach($services as $row)
                    <option value="{{$row->id}}">{{$row->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 mt-3">
                <label for="contactName" class="form-label">Contact Person Name</label>
                <input type="text" class="form-control" id="contactName" name="contactName"></input>
            </div>
            <div class="col-12 mt-3">
                <label for="email" class="form-label">Email</label>
                <input  type="text" class="form-control" id="email" name="email"></input>
            </div>
            <div class="col-12 mt-3">
                <label for="contactNo" class="form-label">Contact Number</label>
                <input  type="text" class="form-control" id="contactNo" name="contactNo"></input>
            </div>
            <div class="text-center" style="margin-top:50px;">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reply of Inquiry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="reply-text">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')

<script>
    $(".reply-btn").click(function(e){
      e.preventDefault();
      let reply = $(this).attr("data-reply");
      $("#reply-text").html(reply);
    });
</script>

@endsection