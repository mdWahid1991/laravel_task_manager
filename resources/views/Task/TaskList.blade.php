@extends('layout')
@section('title', 'Task Lists')
@section('content')
<div class="row d-flex flex-column mt-4">
    <div class="d-flex justify-content-around" >
    <h2>Task List</h2>
    @if(Session::get('loginId') === 1)
    <a href="{{route('taskcreate')}}" class="btn btn-info float-right text-center"> Create Task</a>
    @endif
    </div>
    @foreach ($task as $t)
    <div class="card d-flex col-6 mx-auto mt-5 " >
        <div class="card-header">
            <h4>{{$t->title}}  
                <span class="badge rounded-pill bg-warning text-dark"> {{$t->created_at->diffForHumans()}}</span>
            </h4>
        </div>

        <div class="card-body">
            <div class="card-text">
                <div class="float-start">
                    {{$t->description}}
                    <br>
                    <span class="badge rounded-pill bg-info text-dark mt-2">{{$t->status}}</span>
                    <small class="mt-2">Last Updated-{{$t->updated_at->diffForHumans()}}</small>
                </div>
                <div class="float-end mt-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        View
                    </button>
                    {{-- modal --}}
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Task Overview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$t->title}}" readonly >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="4" readonly>{{$t->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Assign To</label>
                <input type="text" class="form-control" name="assign_to" value="{{$t->assign_to_name}}" readonly >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Status</label>
                <input type="text" class="form-control" name="status" value="{{$t->status}}" readonly >
            </div>
    
            <div class="mb-3">
                <label for="" class="form-label">Comment</label>
                <textarea type="text" class="form-control" id="comment" name="comment" rows="4" readonly>{{$t->user_comment}}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">File</label>
                <div class="container">
                <img src="{{asset('/storage/uploads/'.$t->upload_file)}}" class="rounded img-fluid" alt="...">
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
                    <a href="{{route('taskedit' ,['id'=> $t->id])}}" class="btn btn-success">Edit </a>
                    @if((Session::get('loginId') === 1))
                    <a href="{{route('taskdelete' ,['id'=> $t->id])}}" class="btn btn-danger">Delete </a>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
    @endforeach


        
</div>
@endsection