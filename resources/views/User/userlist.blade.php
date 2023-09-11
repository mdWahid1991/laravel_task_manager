@extends('layout')
@section('title', 'User Lists')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                    
            @foreach ($user as $u)
                
            <tr>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>
                    @if($u->status == 1) active
                    @else inactive 
                    @endif
                </td>
                <td>
                    @if($u->user_role == "S") Super Admin
                    @elseif($u->user_role == "A") Admin
                    @elseif($u->user_role == "U") User
                    @else Guest 
                    @endif
                </td>
                
                <td>
                    <a href="{{route('useredit' ,['id'=> $u->id])}}" class="btn btn-primary"> Edit 
                    </a>
                    <a href="" class="btn btn-danger">
                    Delete</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection