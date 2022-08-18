@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Blog - Articles</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('article.add') }}"><button class="btn btn-info">Add Article</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All Articles</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="10%">Title</th>
      <th scope="col" width="15%">Entry Content</th>
      <th scope="col" width="10%">Entry Image</th>
      <th scope="col" width="25%">Main Content</th>
      <th scope="col" width="5%">Category Id</th>
      <th scope="col" width="5%">Author Id</th>
      <th scope="col" width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($articles as $article) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $article->title }} </td>
      <td> {{ $article->entry_content }} </td>
      <td> {{ $article->entry_img }} </td>
      <td> {{ $article->main_content }} </td>
      <td> {{ $article->category_id }} </td>
      <td> {{ $article->author_id }} </td>
      
    <td><a href="{{ route('article.edit', $article->id) }}" class="btn btn-info">Edit</a><br><br>
    <a href="{{ route('article.delete', $article->id) }}" onclick="return confirm('Are you sure, you want to delete this Article?')" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $articles->links() }}
    </div>
    </div>
        </div>


    </div>

@endsection