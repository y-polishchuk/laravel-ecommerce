@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-8">
        <div class="card">

        <div class="card-header">All Tags</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Tag Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- @php($i = 1) -->
    @foreach($tags as $tag) 
    <tr>
      <th scope="row"> {{ $tags->firstItem()+$loop->index }} </th> 
      <!-- get a number of the first element in result + the index of the current item -->
      <td> {{ $tag->name }} </td>
      <td> 
        @if($tag->created_at == null)
        <span class="text-danger">No Date Set</span>
        @else
      {{ Carbon\Carbon::parse($tag->created_at)->diffForHumans() }} 
        @endif
    </td>
    <td><a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('tag.softdelete', $tag->id) }}" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $tags->links() }}
    </div>
    </div>

    <div class="col-md-4">
        <div class="card">
        <div class="card-header">Add Tag</div>

        <div class="card-body">
        
<form action="{{ route('tag.store') }}" method="POST">
    @csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tag Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('name')
    <span class="text-danger"> {{ $message }}</span>
    @enderror
</div>
  
  <button type="submit" class="btn btn-primary">Add Tag</button>
</form>
</div>
        </div>
        </div>

        </div>
        </div>


<!-- Trash Part -->


        <div class="container">
        <div class="row">

        <div class="col-md-8">
        <div class="card">

        <div class="card-header">Trash List</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Tag Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <!-- @php($i = 1) -->
    @foreach($trashTag as $trag) 
    <tr>
      <th scope="row"> {{ $trashTag->firstItem()+$loop->index }} </th> 
      <!-- get a number of the first element in result + the index of the current item -->
      <td> {{ $trag->name }} </td>
      <td> 
        @if($trag->created_at == null)
        <span class="text-danger">No Date Set</span>
        @else
      {{ Carbon\Carbon::parse($trag->created_at)->diffForHumans() }} 
        @endif
    </td>
    <td><a href="{{ route('tag.restore', $trag->id) }}" class="btn btn-info">Restore</a>
    <a href="{{ route('tag.permdelete', $trag->id) }}" class="btn btn-danger">PermDelete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $trashTag->links() }}
    </div>
    </div>

    <div class="col-md-4">
        
        </div>

        </div>
        </div>

<!-- End Trash -->

    </div>
@endsection
