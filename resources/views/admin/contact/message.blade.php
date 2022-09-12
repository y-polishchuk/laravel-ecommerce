@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        
        <h4>Admin Message Page</h4>
        <br><br>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Message Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="10%">SL No</th>
      <th scope="col" width="15%">Name</th>
      <th scope="col" width="15%">Email</th>
      <th scope="col" width="15%">Subject</th>
      <th scope="col" width="25%">Message</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($messages as $mess) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $mess->name }} </td>
      <td> {{ $mess->email }} </td>
      <td> {{ Illuminate\Support\Str::limit($mess->subject, 100) }} </td>
      <td> {{ Illuminate\Support\Str::limit($mess->message, 100) }} </td>
      
    <td>
    <a href="{{ route('message.delete', $mess->id) }}" onclick="return confirm('Are you sure, you want to delete this Message?')" class="btn btn-danger">Delete</a>
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