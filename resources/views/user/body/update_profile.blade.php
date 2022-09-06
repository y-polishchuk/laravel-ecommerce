@extends('user.user_master')

@section('user')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>User Profile Update</h2>
    </div>
   
    <div class="card-body">
        <form method="POST" action="{{ route('update.user.profile') }}" class="form-pill"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ $user->profile_photo_path }}">
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="user_email">User Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="user_image" class="form-label">Update User Image</label>
                <input type="file" name="user_image" class="form-control" id="user_image" value="{{ $user->profile_photo_path }}">
            </div>
            <button type="submit" class="btn btn-primary btn-default">Update</button>
        </form>
    </div>
</div>

@endsection