@extends('layout')
@section('title', 'Task Lists')
@section('content')
<div>
    <div class="row mt-4">
        <div class="col-4"></div>
        <div class="col-4" >
        <h4 class="pb-3 text-center">Create Task</h4>
        </div>
        <div class="col-4"></div>
    </div>
    
</div>
<div class="row mt-2">
    <div class="col-4"></div>
    <div class="card card-body bg-light p-4 col-4">
    <form action="{{ route('taskstore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Assign To</label>
            <select name="assign_to" id="" class="form-control form-select">
                @foreach ($assign as $ass)
                    <option value="{{ $ass->name }}">{{ $ass->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Status</label>
            <select name="status" id="status" class="form-control form-select">
                @foreach ($statuses as $status)
                    <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Comment</label>
            <textarea type="text" class="form-control" id="comment" name="comment" rows="4" ></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">File</label>
            <input type="file" class="form-control" id="upload" name="upload" value=""/>
        </div>


        <a href="{{route('task')}}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Cancel</a>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Save
        </button>
    </form>
    </div>
    <div class="col-4"></div>
</div>
@endsection