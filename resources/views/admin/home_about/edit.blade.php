@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit About Section</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('about.update', $about) }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $about->title }}">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Intro</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_des">{{ $about->short_des }}</textarea>
</div>
@error('short_des')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Text</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_des">{{ $about->long_des }}</textarea>
</div>
@error('long_des')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Update</button>
</div>
        </form>
    </div>
</div>

@endsection