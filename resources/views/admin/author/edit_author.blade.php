@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Author</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $author->photo }}">
<div class="form-group">
    <label for="exampleFormControlInput1">Update Full Name</label>
    <input type="text" name="full_name" class="form-control" id="exampleFormControlInput1" value="{{ $author->full_name }}">
</div>
@error('full_name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="formControlText1">Update About Author</label>
    <textarea type="text" name="about" class="form-control" id="formControlText1" placeholder="About Author">{{ $author->about }}</textarea>
</div>
@error('about')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Twitter Link</label>
    <input type="text" name="twitter" class="form-control" id="exampleFormControlInput2" value="{{ $author->twitter }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Update Facebook Link</label>
    <input type="text" name="facebook" class="form-control" id="exampleFormControlInput2" value="{{ $author->facebook }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Update Instagram Link</label>
    <input type="text" name="instagram" class="form-control" id="exampleFormControlInput2" value="{{ $author->instagram }}">
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Update Photo</label>
    <input type="file" name="photo" class="form-control-file" value="{{ $author->photo }}">
</div>
@error('photo')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="mb-3">
<img src="{{ asset($author->photo) }}" width="400px">
</div>
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection