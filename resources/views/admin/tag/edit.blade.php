@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        

    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Edit Tag</div>

        <div class="card-body">
        
<form action="{{ route('tag.update', $tag->id) }}" method="POST">
    @csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Update Tag Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $tag->name }}">
    @error('name')
    <span class="text-danger"> {{ $message }}</span>
    @enderror
</div>
  
  <button type="submit" class="btn btn-primary">Update Tag</button>
</form>
</div>
        </div>
        </div>

        </div>
        </div>
    </div>
@endsection
