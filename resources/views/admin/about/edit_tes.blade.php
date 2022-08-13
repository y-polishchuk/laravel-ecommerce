@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Testimonial</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('tes.update', $tes->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $tes->photo }}">
<div class="form-group">
    <label for="exampleFormControlInput1">Update Author`s Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $tes->name }}">
</div>
@error('name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Author`s Position</label>
    <input type="text" name="position" class="form-control" id="exampleFormControlInput2" value="{{ $tes->position }}">
</div>
@error('position')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Update Testimonial Text</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">{{ $tes->text }}</textarea>
</div>
@error('text')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlFile1">Update Author`s Photo</label>
    <input type="file" name="photo" class="form-control-file" value="{{ $tes->photo }}">
</div>
@error('photo')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="mb-3">
<img src="{{ asset($tes->photo) }}" width="400px">
</div>
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection