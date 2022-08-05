@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Home Service</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('services.add') }}"><button class="btn btn-info">Add Service Info</button></a>
        </div>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Service Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="5%">Service Title</th>
      <th scope="col" width="15%">Description</th>
      <th scope="col" width="5%">Icon Color</th>
      <th scope="col" width="5%">Icon Form</th>
      <th scope="col" width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($homeservice as $service) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $service->title }} </td>
      <td> {{ $service->description }} </td>
      <td> {{ $service->icon_color }} </td>
      <td> {{ $service->icon_form }} </td>
      
    <td><a href="{{ route('services.edit', $service->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('services.delete', $service->id) }}" onclick="return confirm('Are you sure, you want to delete this Service?')" class="btn btn-danger">Delete</a>
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