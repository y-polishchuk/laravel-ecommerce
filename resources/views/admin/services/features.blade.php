@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Services Page - Features</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('feature.add') }}"><button class="btn btn-info">Add Feature</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Services Features</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Feature Title</th>
      <th scope="col" width="20%">Feature Icon Color</th>
      <th scope="col" width="25%">Feature Icon Form</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($features as $feature) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $feature->title }} </td>
      <td> {{ $feature->color }} </td>
      <td> {{ $feature->form }} </td>
      
    <td><a href="{{ route('feature.edit', $feature->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('feature.delete', $feature->id) }}" onclick="return confirm('Are you sure, you want to delete this Feature?')" class="btn btn-danger">Delete</a>
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