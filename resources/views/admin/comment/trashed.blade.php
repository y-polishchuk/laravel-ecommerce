@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Admin Trashed Comments Page</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('admin.comments') }}"><button class="btn btn-secondary">Published Comments</button></a>
        </div>
        <br><br>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Trashed Comments Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="10%">SL No</th>
      <th scope="col" width="15%">User Name</th>
      <th scope="col" width="10%">Is Reply</th>
      <th scope="col" width="25%">Comment Text</th>
      <th scope="col" width="15%">Article URL</th>
      <th scope="col" width="5%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($trashed as $com) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $com->user->name }} </td>
      <td> {{ $com->parent_id ? 'TRUE' : 'FALSE' }} </td>
      <td> {{ Illuminate\Support\Str::limit($com->body, 100) }} </td>
      <td> <a href="{{ route('blog.single', $com->commentable_id) }}">{{ route('blog.single', $com->commentable_id) }}</a> </td>
      
    <td>
    <td><p><a href="{{ route('admin.comment.restore', $com->id) }}" class="btn btn-info">Restore</a></p>
    <p><a href="{{ route('admin.comment.permdelete', $com->id) }}" onclick="return confirm('Are you sure, you want to delete permanently this Comment?')" class="btn btn-danger">PermDelete</a></p>
    </td>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $trashed->links() }}
    </div>
    </div>
        </div>


    </div>

@endsection