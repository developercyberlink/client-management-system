@extends('layouts.user')

@section('content')

<h3 class="text-center">Task management</h3>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Feedback of {{$data->title}}</h5>

        <div class="messages">
            @foreach($messages as $message)
                @if($message->sender==0)
                <p>You ({{$message->created_at}}): {{$message->message}}</p> 
                @else
                <p>Cyberlink ({{$message->created_at}}): {{$message->message}}</p>
                @endif
            @endforeach
        </div>

        <form id="content_form">

            <input type="hidden" name="id" value="{{$data->id}}">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control"></textarea>

            <input type="submit" value="Send" class="btn btn-primary">
        </form>

    </div>
</div>

@endsection

@section('script')

<script>

$("#content_form").submit(function(e){
    e.preventDefault();

    let form = document.getElementById('content_form');
    let formData = new FormData(form);

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
        enctype: 'multipart/form-data',
          url: "{{route('user.task.pushfeedback')}}",
          data: formData,
          success: function(data)
          {
            if(data.status=="success"){
                toastr.success(data.message);
                $("#content_form")[0].reset();
                location.reload();
            }else{
                data.errors.map(function(error){
                    toastr.error(error);
                });
            }
          }
      });
});

</script>

@endsection