@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Service</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('services.update', $service) }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Service Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $service->title }}">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Service Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $service->description }}</textarea>
</div>
@error('description')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-group">
    <label for="exampleFormControlInput3">Service Icon Color</label>
    <input type="text" name="icon_color" class="form-control" id="exampleFormControlInput3" value="{{ $service->icon_color }}">
</div>
@error('icon_color')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-group">
    <label for="exampleFormControlInput4">Service Icon Form</label>
    <input type="text" name="icon_form" class="form-control" id="exampleFormControlInput4" value="{{ $service->icon_form }}">
</div>
@error('icon_form')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Update</button>
</div>
        </form>
    </div>
</div>

@endsection