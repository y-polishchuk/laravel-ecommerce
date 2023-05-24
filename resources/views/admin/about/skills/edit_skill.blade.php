@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Skill</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('skill.update', $skill->id) }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Update Skill Name</label>
    <input type="text" name="skill_name" class="form-control" id="exampleFormControlInput1" value="{{ $skill->skill_name }}">
</div>
@error('skill_name')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Update Value</label>
    <input type="text" name="value" class="form-control" id="exampleFormControlInput2" value="{{ $skill->value }}">
</div>
@error('value')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Update</button>
</div>
        </form>
    </div>
</div>

@endsection