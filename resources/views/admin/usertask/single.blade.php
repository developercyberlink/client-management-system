@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$task->title}}</h5>
        @if($task->completion_time==null)
        <form action="{{route('admin.usertask.markcomplete')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
            <input type="submit" value="Mark as completed" class="btn btn-primary">
        </form>
        @else
        <p class="text-info">Completed at: {{$task->completion_time}}</p>
        @endif
        <p class="text-info">Created at: {{$task->created_at}}</p>
        <hr>
        <p>
            {{$task->description}}
        </p>
    </div>
  </div>

  @if($task->task_id==null)
  @can('user_task_forward')
  <div class="card" style="margin-top:50px;">
    <div class="card-body">
        <h5 class="card-title">Assign Task to</h5>
        <form class="row g-3" action="{{route('admin.task.createusertask')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}">
            <div class="col-12">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" value="{{$task->title}}" name="title" id="title">
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="tinymce-editor" id="description" name="description">
                    {{$task->description}}
                </textarea>
            </div>
            <div class="col-12">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="datetime-local" class="form-control" name="deadline" id="deadline">
            </div>
            <div class="col-12">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" class="form-control" id="priority">
                    @foreach ($priorities as $priority)
                    <option value="{{$priority->id}}">{{$priority->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label for="admins" class="form-label">Assign to(users):</label> <br>
                @foreach($admins as $admin)
                    <input type="checkbox" name="admins[]" value="{{$admin->id}}"> <label>{{$admin->name}}</label>
                @endforeach
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->
    </div>
  </div>
  @endcan
  @else
  <p>
    Already Assigned
    <ul>
    @foreach ($task->referenceTask->assignedTo as $assigned)
    <li>{{$assigned->assignedAdmin()->name}}</li>
    @endforeach
    </ul>
  </p>
  @endif

@endsection