@extends('admin.admin_master')

@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Admin Profile Update</h2>
    </div>
   
    <div class="card-body">
        <form method="POST" action="{{ route('update.admin.profile') }}" class="form-pill"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ $admin->profile_photo_path }}">
            <div class="form-group">
                <label for="user_name">Admin Name</label>
                <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label for="user_email">Admin Email</label>
                <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
            </div>
            <div class="form-group">
                <label for="admin_image" class="form-label">Update Admin Image</label>
                <input type="file" name="admin_image" class="form-control" id="admin_image" value="{{ $admin->profile_photo_path }}">
            </div>
            <button type="submit" class="btn btn-primary btn-default">Update</button>
        </form>
    </div>
</div>

@endsection