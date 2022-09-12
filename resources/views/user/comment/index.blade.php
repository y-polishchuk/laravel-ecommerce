@extends('user.user_master')

@section('user')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        
        <h4>User Comments Page</h4>
        <br><br>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">User Comments Data</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="10%">SL No</th>
      <th scope="col" width="15%">User Name</th>
      <th scope="col" width="10%">Is Reply</th>
      <th scope="col" width="25%">Comment Text</th>
      <th scope="col" width="15%">Article</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($comments as $com) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      <td> - </td>
      <td> {{ $com->parent_id ? 'Reply' : 'Comment' }} </td>
      <td> {{ $com->body }} </td>
      <td> <a href="{{ route('blog.single', $com->commentable_id) }}">{{ route('blog.single', $com->commentable_id) }}</a> </td>
      
    <td>
    <a href="{{ route('user.comment.delete', $com->id) }}" onclick="return confirm('Are you sure, you want to delete this Comment?')" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @foreach($com->replies as $reply)
    <tr>
      <th scope="row"> ^ </th> 
      <td> {{ $reply->user->name }} </td>
      <td> Reply </td>
      <td> {{ Illuminate\Support\Str::limit($reply->body, 100) }} </td>
      <td> <a href="{{ route('blog.single', $reply->commentable_id) }}">{{ route('blog.single', $com->commentable_id) }}</a> </td>
      
    <td>
    @if($reply->user->id === Auth::user()->id)
    <a href="{{ route('user.comment.delete', $reply->id) }}" onclick="return confirm('Are you sure, you want to delete this Reply?')" class="btn btn-danger">Delete</a>
    @endif
    </td>
    </tr>

    @endforeach
    @endforeach
  </tbody>
</table>
{{ $comments->links() }}
    </div>
    </div>
        </div>


    </div>

@endsection