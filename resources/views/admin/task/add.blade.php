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
        <h5 class="card-title">Add new Task</h5>

        <form class="row g-3" action="{{route('admin.task.create')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="tinymce-editor" id="description" name="description">
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

@endsection