@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$task->title}}</h5>

        @foreach ($task->assignedTo as $assigned)
        <div class="card">
            <div class="card-body">
                <h4>{{$assigned->assignedAdmin()->name}}</h4>
                <p>@if($assigned->status==0) On Progress @else Completed @endif</p>
                <p>{!! $assigned->remark !!}</p>
                <p>
                    <h3>History:</h3>
                    <ul>
                        <li>{{$assigned->created_at}} Assigned to 
                            @if(count($assigned->logs)==0)
                            {{$assigned->assignedAdmin()->name}}
                            @else
                            {{$assigned->logs[0]->transferredBy->name}}
                            @endif
                        </li>
                        @foreach ($assigned->logs as $log)
                        <li>{{$log->transferredBy->name}} transferred to {{$log->transferredTo->name}} with remark: {{$log->remarks}}</li>
                        @endforeach
                        @if($assigned->status==1)
                        <li>
                            Completed by {{$assigned->assignedAdmin()->name}} at {{$assigned->updated_at}}
                        </li>
                        @endif
                    </ul>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection