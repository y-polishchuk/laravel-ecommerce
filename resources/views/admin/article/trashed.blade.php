@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>Blog - Trashed Articles</h4>
        </div>
        
        
        <div class="col-md-3">
        <a href="{{ route('admin.articles') }}"><button class="btn btn-info">Published Articles</button></a>
        </div>
        <br><br>


        <div class="col-md-12">
        <div class="card">

        <div class="card-header">Trashed Articles</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="15%">Title</th>
      <th scope="col" width="20%">Entry Content</th>
      <th scope="col" width="10%">Entry Image</th>
      <th scope="col" width="20%">Main Content</th>
      <th scope="col" width="10%">Category Name</th>
      <th scope="col" width="10%">Author Name</th>
      <th scope="col" width="10%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($trashed as $article) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ Illuminate\Support\Str::limit($article->title, 100) }} </td>
      <td> {{ Illuminate\Support\Str::limit($article->entry_content, 100) }} </td>
      <td><img src="{{ asset($article->entry_img) }}" style="height:80px;"></td>
      <td> {{ Illuminate\Support\Str::limit($article->main_content, 100) }} </td>
      <td> {{ $article->category->category_name }} </td>
      <td> {{ $article->author->full_name }} </td>
      
    <td><a href="{{ route('article.restore', $article->id) }}" class="btn btn-info">Restore</a>
    <a href="{{ route('article.permdelete', $article->id) }}" onclick="return confirm('Are you sure, you want to delete permanently this Article?')" class="btn btn-danger">PermDelete</a>
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