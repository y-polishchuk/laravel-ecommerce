@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Contact Page</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('contact.add') }}"><button class="btn btn-info">Add Contact</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Contact Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Contact Address</th>
      <th scope="col" width="20%">Contact Email</th>
      <th scope="col" width="25%">Contact Phone</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($contacts as $con) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $con->address }} </td>
      <td> {{ $con->email }} </td>
      <td> {{ $con->phone }} </td>
      
    <td><a href="{{ route('contact.edit', $con->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('contact.delete', $con->id) }}" onclick="return confirm('Are you sure, you want to delete this Contact?')" class="btn btn-danger">Delete</a>
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