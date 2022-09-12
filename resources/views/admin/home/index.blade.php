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

        <div class="card-header">All About Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Home About Title</th>
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
      
      <td> {{ Illuminate\Support\Str::limit($about->title, 100) }} </td>
      <td> {{ Illuminate\Support\Str::limit($about->short_des, 100) }} </td>
      <td> {{ Illuminate\Support\Str::limit($about->long_des, 100) }} </td>
      
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