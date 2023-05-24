@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add Testimonial</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('tes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Author`s Full Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
</div>
@error('name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Author`s Position</label>
    <input type="text" name="position" class="form-control" id="exampleFormControlInput2" placeholder="Position">
</div>
@error('position')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Testimonial Text</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" placeholder="Testimonial Text"></textarea>
</div>
@error('text')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlFile1">Author`s Photo</label>
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