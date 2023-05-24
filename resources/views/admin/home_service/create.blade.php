@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Create Service</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('services.store') }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Service Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Service Title">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Service Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Service Description"></textarea>
</div>
@error('description')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-group">
    <label for="exampleFormControlInput3">Service Icon Color</label>
    <input type="text" name="icon_color" class="form-control" id="exampleFormControlInput3" placeholder="Service Icon Color">
</div>
@error('icon_color')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-group">
    <label for="exampleFormControlTextarea1">Service Icon Form</label>
    <input type="text" name="icon_form" class="form-control" id="exampleFormControlInput4" placeholder="Service Icon Form">
</div>
@error('icon_form')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection