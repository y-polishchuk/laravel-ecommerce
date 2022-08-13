@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>About Us Page - Our Team</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('member.add') }}"><button class="btn btn-info">Add Member</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Team Members</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Full Name</th>
      <th scope="col" width="10%">Position</th>
      <th scope="col" width="10%">Photo</th>
      <th scope="col" width="5%">Twitter</th>
      <th scope="col" width="5%">Facebook</th>
      <th scope="col" width="5%">Instagram</th>
      <th scope="col" width="5%">Linkedin</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($teamMembers as $member) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $member->name }} </td>
      <td> {{ $member->position }} </td>
      <td> {{ $member->photo }} </td>
      <td> {{ $member->twitter }} </td>
      <td> {{ $member->facebook }} </td>
      <td> {{ $member->instagram }} </td>
      <td> {{ $member->linkedin }} </td>
      
    <td><a href="{{ route('member.edit', $member->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('member.delete', $member->id) }}" onclick="return confirm('Are you sure, you want to delete this Member?')" class="btn btn-danger">Delete</a>
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