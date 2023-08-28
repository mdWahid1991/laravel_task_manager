@extends('layout')
   @section('title', 'Registration')
   @section('content')
    <div>
        <div class="row d-flex flex-column min-vh-100 justify-content-center align-items-center">
          <div class="mx-auto col-3 card p-3 ">
            <!-- Form -->
            <form class="form-example" action="{{route('reg.post')}}" method="post">
                @csrf
                @if(Session::has('success'))
                    @foreach(Session::get('success') as $success)
                        <div class="alert alert-success">{{$success}}</div>
                    @endforeach
                @endif
                
                @if(Session::has('error'))
                    @foreach(Session::get('error') as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif

                <h1 class="text-center">Register</h1>
                <!-- Input fields -->
                <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" value="{{old('username')}}"/>
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="{{old('email')}}"/>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                <label for="">Password</label>
                <input
                  type="password" class="form-control" name="password"/>
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                <label for="">Confirm Password</label>
                <input
                  type="password" class="form-control" name="password_confirmation" />
                <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
              </div>
  
              <button type="submit" class="btn btn-primary btn-customized mt-4">
                Submit
              </button>
            </form>
            <!-- Form end -->
          </div>
        </div>
      </div>
    @endsection