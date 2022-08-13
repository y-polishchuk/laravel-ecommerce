@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>About Us Page - Testimonials</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('tes.add') }}"><button class="btn btn-info">Add Testimonial</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Testimonials</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Full Name</th>
      <th scope="col" width="10%">Position</th>
      <th scope="col" width="20%">Testimonial</th>
      <th scope="col" width="10%">Photo</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($testimonials as $tes) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $tes->name }} </td>
      <td> {{ $tes->position }} </td>
      <td> {{ $tes->text }} </td>
      <td> {{ $tes->photo }} </td>
      
    <td><a href="{{ route('tes.edit', $tes->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('tes.delete', $tes->id) }}" onclick="return confirm('Are you sure, you want to delete this Testimonial?')" class="btn btn-danger">Delete</a>
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