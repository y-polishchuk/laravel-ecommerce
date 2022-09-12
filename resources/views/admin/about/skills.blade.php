@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>About Us Page - Our Skills</h4>
        </div>
        <br><br>


        <div class="col-md-9">
        <div class="card">

        <div class="card-header">All Skills</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Skill Name</th>
      <th scope="col" width="10%">Value, %</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($skills as $skill) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $skill->skill_name }} </td>
      <td> {{ $skill->value }} </td>
      
    <td><a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('skill.delete', $skill->id) }}" onclick="return confirm('Are you sure, you want to delete this Skill?')" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
    </div>
    <div class="col-md-3">
        <div class="card">
        <div class="card-header">Add Skill</div>

        <div class="card-body">
        
<form action="{{ route('skill.store') }}" method="POST">
    @csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Skill Name</label>
    <input type="text" name="skill_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('skill_name')
    <span class="text-danger"> {{ $message }}</span>
    @enderror
    <label for="exampleInputEmail2" class="form-label">Value</label>
    <input type="text" name="value" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp">
    @error('value')
    <span class="text-danger"> {{ $message }}</span>
    @enderror
</div>
  
  <button type="submit" class="btn btn-primary">Add Skill</button>
</form>
</div>
        </div>
        </div>

        </div>
        </div>

        

    </div>

@endsection