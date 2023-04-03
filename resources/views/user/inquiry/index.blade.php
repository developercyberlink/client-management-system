@extends('layouts.user')

@section('content')

<h3 class="text-center">Inquiry management</h3>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Replied ?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $row)
                <tr>
                    <td>{{$row->service->title}}</td>
                    <td>
                        @if($row->reply)
                        <button type="button" data-reply="{{$row->reply}}" class="btn btn-primary reply-btn" data-toggle="modal" data-target="#exampleModal">
                          View Reply
                        </button>
                        @else
                        Not replied
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

<div class="card" style="margin-top:50px;">
    <div class="card-body">

        <h5 class="card-title">Create New Inquiry</h5>

        <form class="row g-3" action="{{route('user.inquiry.create')}}" method="POST">
            @csrf
            <div class="col-12">
              <label for="service" class="form-label">Select a service</label>
              <select name="service" id="service" class="form-control">
                @foreach($services as $row)
                    <option value="{{$row->id}}">{{$row->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12 mt-3">
                <label for="inquiry" class="form-label">Inquiry</label>
                <textarea class="tinymce-editor form-control" id="inquiry" name="inquiry">
                </textarea>
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