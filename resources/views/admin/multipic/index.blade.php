@extends('admin.admin_master')

  @section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-8">

        <div class="card-group">

    @foreach($images as $multi)

<div class="col-md-4 mt-5 mb-3">
    
    <div class="card" >
        <img src="{{ asset($multi->image) }}" alt="" class="card-img-top">
        <div class="card-body">
        <a href="{{ route('images.delete', $multi->id) }}" onclick="return confirm('Are you sure, you want to delete this Image?')" class="btn btn-danger">Delete</a>
        </div>

    </div>
    
</div>

    @endforeach    
    </div>
    </div>

    <div class="col-md-4">
        <div class="card">
        <div class="card-header">Multi Image</div>

        <div class="card-body">
        
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Multi Image</label>
    <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
    @error('image')
    <span class="text-danger"> {{ $message }}</span>
    @enderror
</div>
  <button type="submit" class="btn btn-primary">Add Image</button>
</form>
</div>
        </div>
        </div>

        </div>
        </div>


    </div>
@endsection