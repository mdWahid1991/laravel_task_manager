@extends('layout')
@section('title', 'Home')
@section('content')
    {{-- body content --}}
    <div class="container text-center">
        <div class="row">
          {{-- <div class="col"></div> --}}
          <div class="col-12 p-5" >
            <h1>Welcome {{$name}}</h1>
            @if($name == "Guest")
            <h3>Please log in to access the task manager features</h3>
            <h4>User name = Admin Password: password</h4>
            <h4>Or register new user</h4>
            <h4>Admin can create, view, edit and delete tasks</h4>
            <h4>Users can only view and edit tasks</h4>
            @endif
          </div>
          {{-- <div class="col"></div> --}}
          
        </div>
        <div>{{auth()->user()}}</div>
      </div>
@endsection
