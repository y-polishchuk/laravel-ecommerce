@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Home About</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('about.add') }}"><button class="btn btn-info">Add About Info</button></a>
        </div>

        <div class="col-md-12">
        <div class="card">
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <div class="card-header">All About Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Home Title</th>
      <th scope="col" width="20%">Short Description</th>
      <th scope="col" width="25%">Long Description</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($homeabout as $about) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $about->title }} </td>
      <td> {{ $about->short_des }} </td>
      <td> {{ $about->long_des }} </td>
      
    <td><a href="{{ route('about.edit', $about->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('about.delete', $about->id) }}" onclick="return confirm('Are you sure, you want to delete this About?')" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
    </div>
        </div>


    </div>

@endsection