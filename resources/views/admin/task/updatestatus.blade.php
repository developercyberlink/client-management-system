@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{$assignedTask->task->title}}</h1>
        <p>
            Deadline: {{$assignedTask->task->deadline}}
            @if($assignedTask->status==0)

            <form action="{{route('admin.task.markcomplete')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$assignedTask->id}}">
                <input type="submit" value="Mark as completed" class="btn btn-primary">
            </form>
            <hr>
                <h3 class="text-center">Transfer Task:</h3>
            <hr>

            <form action="{{route('admin.task.transfer')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$assignedTask->id}}">
                <label for="remarks">Transfer Remark</label>
                <textarea name="remarks" id="remarks" class="form-control">

                </textarea>
                <label for="transferred_to">Transfer to:</label>
                <select name="transferred_to" class="form-control" id="transferred_to">
                @foreach ($admins as $admin)
                @if(Auth::id() != $admin->id)
                <option value="{{$admin->id}}">{{$admin->name}}</option>
                @endif
                @endforeach
                </select>
                <input type="submit" value="Transfer Task" class="btn btn-primary">
            </form>

            @else
        <h5>Completed</h5>
        @endif
        </p>
        <h4>Remarks: </h4>
        <p>{!!$assignedTask->task->description!!}</p>
        @if($log!=null)
        <h3>Transfer remark:</h3>
        <p>{{$log->remarks}}</p>
        @endif

        <form action="{{route('admin.task.sendremark')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$assignedTask->id}}">
            <div class="col-12">
                <label for="remark" class="form-label">Remarks</label>
                <textarea class="tinymce-editor" id="remark" name="remark">
                    {{$assignedTask->remark}}
                </textarea>
            </div>
            <input type="submit" value="Send Remark" class="btn btn-primary">
        </form>
        
    </div>
</div>

@endsection