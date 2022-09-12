@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Prices</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('price.add') }}"><button class="btn btn-info">Add Price</button></a>
        </div>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Prices</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Unit Title</th>
      <th scope="col" width="10%">Unit Price</th>
      <th scope="col" width="25%">Features</th>
      <th scope="col" width="5%">Advanced</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($prices as $price) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $price->title }} </td>
      <td> {{ $price->price }} </td>
      <td> {{ Illuminate\Support\Str::limit($price->features, 100) }} </td>
      <td> {{ $price->advanced }} </td>
    <td><a href="{{ route('price.edit', $price->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('price.delete', $price->id) }}" onclick="return confirm('Are you sure, you want to delete this Price?')" class="btn btn-danger">Delete</a>
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