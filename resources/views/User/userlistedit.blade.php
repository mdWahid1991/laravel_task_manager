@extends('layout')
@section('title', 'User Edit')
@section('content')
<div>
    <div class="row d-flex flex-column min-vh-100 justify-content-center align-items-center">
      <div class="mx-auto col-3 card p-3 ">
        <!-- Form -->
        <form class="form-example" action="{{ route('userupdate', ['id' => $user->id]) }}" method="post">
          @csrf
          
          <h1 class="text-center">User Assign</h1>
          <!-- Input fields -->
          <div class="form-group">
            <label for="" class="form-label">Status</label>
            <select name="status" id="" class="form-control form-select" >
                @foreach ($status as $s)
                    <option value="{{ $s['value'] }}" {{  $user->status === $s['value'] ? 'selected' : ''}}> {{ $s['label'] }} </option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="description" class="form-label">Assign To</label>
            <select name="user_role" id="" class="form-control form-select" >
                @foreach ($role as $r)
                    <option value="{{ $r['value'] }}" {{  $user->user_role === $r['value'] ? 'selected' : ''}}> {{ $r['label'] }} </option>
                @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary btn-customized mt-4">
            Update
          </button>
        </form>
        <!-- Form end -->
      </div>
    </div>
  </div>
@endsection