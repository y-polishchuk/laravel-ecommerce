@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add Author</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" name="full_name" class="form-control" id="exampleFormControlInput1" placeholder="Author Full Name">
</div>
@error('full_name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="formControlText1">About Author</label>
    <textarea type="text" name="about" class="form-control" id="formControlText1" placeholder="About Author"></textarea>
</div>
@error('about')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Twitter Link</label>
    <input type="text" name="twitter" class="form-control" id="exampleFormControlInput2" placeholder="Team Member Twitter Link" value="#">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Facebook Link</label>
    <input type="text" name="facebook" class="form-control" id="exampleFormControlInput2" placeholder="Team Member Facebook Link" value="#">
</div>
<div class="form-group">
    <label for="exampleFormControlInput2">Instagram Link</label>
    <input type="text" name="instagram" class="form-control" id="exampleFormControlInput2" placeholder="Team Member Instagram Link" value="#">
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Photo</label>
    <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
</div>
@error('photo')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection