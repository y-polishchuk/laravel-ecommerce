@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Blog Articles - Authorship</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('author.add') }}"><button class="btn btn-info">Add Author</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Authors</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Full Name</th>
      <th scope="col" width="10%">Photo</th>
      <th scope="col" width="20%">About Author</th>
      <th scope="col" width="5%">Twitter</th>
      <th scope="col" width="5%">Facebook</th>
      <th scope="col" width="5%">Instagram</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($authors as $author) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $author->full_name }} </td>
      <td> <img src="{{ asset($author->photo) }}" style="height:80px;"> </td>
      <td> {{ Illuminate\Support\Str::limit($author->about, 100) }} </td>
      <td> {{ $author->twitter }} </td>
      <td> {{ $author->facebook }} </td>
      <td> {{ $author->instagram }} </td>
      
    <td><a href="{{ route('author.edit', $author->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('author.delete', $author->id) }}" onclick="return confirm('Are you sure, you want to delete this Author?')" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
    {{ $authors->links() }}
    </div>
        </div>


    </div>

@endsection