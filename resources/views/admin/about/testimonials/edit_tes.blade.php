@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Testimonial</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('tes.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $testimonial->photo }}">
<div class="form-group">
    <label for="exampleFormControlInput1">Update Author`s Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $testimonial->name }}">
</div>
@error('name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Author`s Position</label>
    <input type="text" name="position" class="form-control" id="exampleFormControlInput2" value="{{ $testimonial->position }}">
</div>
@error('position')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Update Testimonial Text</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">{{ $testimonial->text }}</textarea>
</div>
@error('text')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlFile1">Update Author`s Photo</label>
    <input type="file" name="photo" class="form-control-file" value="{{ $testimonial->photo }}">
</div>
@error('photo')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="mb-3">
<img src="{{ asset($testimonial->photo) }}" width="400px">
</div>
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection