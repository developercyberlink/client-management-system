@extends('layouts.user')

@section('content')

<h3 class="text-center">Welcome {{ Auth::user()->name }}</h3>

@endsection