@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Create Feature</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('feature.store') }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Feature Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Feature Title">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Feature Icon Color</label>
    <input type="text" name="color" class="form-control" id="exampleFormControlInput2" placeholder="Feature Icon Color">
</div>
@error('color')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput3">Feature Icon Form</label>
    <input type="text" name="form" class="form-control" id="exampleFormControlInput3" placeholder="Feature Icon Form">
</div>
@error('form')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection