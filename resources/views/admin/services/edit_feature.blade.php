@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Feature</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('feature.update', $feature->id) }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Feature Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $feature->title }}">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Feature Icon Color</label>
    <input type="text" name="color" class="form-control" id="exampleFormControlInput2" value="{{ $feature->color }}">
</div>
@error('color')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
<label for="exampleFormControlInput3">Feature Icon Form</label>
    <input type="text" name="form" class="form-control" id="exampleFormControlInput3" value="{{ $feature->form }}">
</div>
@error('form')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Update</button>
</div>
        </form>
    </div>
</div>

@endsection