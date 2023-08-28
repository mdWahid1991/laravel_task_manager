   @extends('layout')
   @section('title', 'login')
    {{-- body content --}}
   @section('content')
    <div>
        <div class="row d-flex flex-column min-vh-100 justify-content-center align-items-center">
          <div class="mx-auto col-3 card p-3 ">
            <!-- Form -->
            <form class="form-example" action="{{route('log.post')}}" method="post">
              @csrf
              @if(Session::has('success'))
              <div class="alert alert-succss">{{Session::get('success')}}</div> 
              @endif
              @if(Session::has('error'))
              <div class="alert alert-danger">{{Session::get('error')}}</div> 
              @endif
              <h1 class="text-center">Login</h1>
              <!-- Input fields -->
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" value="{{old('username')}}" />
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" />
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
              </div>
  
              <button type="submit" class="btn btn-primary btn-customized mt-4">
                Login
              </button>
            </form>
            <!-- Form end -->
          </div>
        </div>
      </div>

      @endsection
