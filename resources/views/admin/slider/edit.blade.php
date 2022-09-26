@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        

    <div class="col-md-8">
        <div class="card">

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <div class="card-header">Edit Slider</div>

        <div class="card-body">
        
<form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $slider->image }}">
    <div class="form-group">
    <label for="exampleFormControlInput1">Update Slider Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Slider Title" value="{{ $slider->title }}">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Slider Page_id</label>
    <input type="text" name="page_id" class="form-control" id="exampleFormControlInput2" placeholder="Slider Page_id" value="{{ $slider->page_id }}">
</div>
@error('page_id')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Update Slider Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $slider->description }}</textarea>
</div>
@error('description')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlFile1">Update Slider Image</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" value="{{ $slider->image }}">
</div>
@error('image')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
<img src="{{ asset($slider->image) }}" width="660px">
</div>

<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Update Slider</button>
</div>

</form>
</div>
        </div>
        </div>

        </div>
        </div>
    </div>
@endsection
