@extends('layouts.user')

@section('content')

<h3 class="text-center">Task management</h3>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Assigned Task</h5>
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Given date</th>
                <th>Status</th>
                <th>Feedback</th>
            </tr>

            @foreach (Auth::user()->tasks as $task)
                <tr>
                    <td>{{$task->title}}</td>
                    <td>{{$task->created_at}}</td>
                    <td>
                        @if($task->completion_time!=null)
                        Completed at: {{$task->completion_time}}
                        @elseif($task->task_id!=null)
                        On Progress
                        @else
                        Unattended
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.task.feedback', $task->id)}}">Feedback</a>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</div>

<div class="card" style="margin-top:50px;">
    <div class="card-body">
        <h5 class="card-title">Give New Task</h5>

        <form class="row g-3" action="{{route('user.task.create')}}" method="POST">
            @csrf
            <div class="col-12">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="tinymce-editor form-control" id="description" name="description">
                </textarea>
            </div>
            <div class="text-center" style="margin-top:50px;">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>
    </div>
</div>
@endsection