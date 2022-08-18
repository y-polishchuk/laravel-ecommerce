@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Article</h2>
    </div>
    <div class="card-body">
    {{ Form::model($article, ['url' => route('article.update', $article->id), 'method' => 'POST', 'files' => 'true']) }}
    {{ Form::hidden('old_image', $article->entry_img) }}
    <div class="form-group">
    {{ Form::label('entry_img', 'Entry Image') }}
    {{ Form::file('entry_img', null, ['class' => 'form-control-file']) }}
    </div>
@error('entry_img')
    <span class="text-danger"> {{ $message }}</span>
@enderror
    <div class="mb-3">
    <img src="{{ asset($article->entry_img) }}" width="400px">
    </div>
    <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', $article->title, ['class' => 'form-control']) }}
    </div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror    
    <div class="form-group">
    {{ Form::label('entry_content', 'Entry Content') }}
    {{ Form::textarea('entry_content', $article->entry_content, ['class' => 'form-control']) }}
    </div>
@error('entry_content')
    <span class="text-danger"> {{ $message }}</span>
@enderror
    <div class="form-group">
    {{ Form::label('main_content', 'Main Content') }}
    {{ Form::textarea('main_content', $article->main_content, ['class' => 'form-control']) }}
    </div>
@error('main_content')
    <span class="text-danger"> {{ $message }}</span>
@enderror
    <div class="form-group">
    {{ Form::label('category_id', 'Category') }}
    {{ Form::select('category_id', $formCats, $article->category_id, ['class' => 'form-control', 'placeholder' => 'Pick a category...']) }}
    </div>
@error('category_id')
    <span class="text-danger"> {{ $message }}</span>
@enderror 
    <div class="form-group">
    {{ Form::label('author_id', 'Author') }}
    {{ Form::select('author_id', $formAuthors, $article->author_id, ['class' => 'form-control', 'placeholder' => 'Pick an author...']) }}
    </div>
@error('author_id')
    <span class="text-danger"> {{ $message }}</span>
@enderror
    <div class="form-group">
    {{ Form::label('tags', 'Tags') }}
    {{ Form::select('tags[]', $tags, $article->tags, ['class' => 'form-control', 'multiple' => true, 'data-bs-toggle' => 'tooltip', 'data-bs-html' => "true", 'title' => "Push 'Ctrl' to pick several items"]) }}
    </div>
@error('tags')
    <span class="text-danger"> {{ $message }}</span>
@enderror
    <div class="form-footer pt-4 pt-5 mt-4 border-top">    
    {{ Form::submit('Update', ['class' => 'btn btn-primary btn-default']) }}
    </div>
{{ Form::close() }}
</div>
</div>

@endsection