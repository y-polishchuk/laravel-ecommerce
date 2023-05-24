@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Team Member</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('member.update', $member) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="old_image" value="{{ $member->photo }}">
<div class="form-group">
    <label for="exampleFormControlInput1">Update Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $member->name }}">
</div>
@error('name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Position</label>
    <input type="text" name="position" class="form-control" id="exampleFormControlInput2" value="{{ $member->position }}">
</div>
@error('position')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Twitter Link</label>
    <input type="text" name="twitter" class="form-control" id="exampleFormControlInput2" value="{{ $member->twitter }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Update Facebook Link</label>
    <input type="text" name="facebook" class="form-control" id="exampleFormControlInput2" value="{{ $member->facebook }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Update Instagram Link</label>
    <input type="text" name="instagram" class="form-control" id="exampleFormControlInput2" value="{{ $member->instagram }}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Update Linkedin Link</label>
    <input type="text" name="linkedin" class="form-control" id="exampleFormControlInput2" value="{{ $member->linkedin }}">
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Update Photo</label>
    <input type="file" name="photo" class="form-control-file" value="{{ $member->photo }}">
</div>
@error('photo')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="mb-3">
<img src="{{ asset($member->photo) }}" width="400px">
</div>
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection