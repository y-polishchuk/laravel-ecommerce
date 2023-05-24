@extends('admin.admin_master')

@section('admin')

<div class="breadcrumb-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Blog</li>
      <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
  </nav>
</div>
  <div class="row">

    <div class="col-md-9">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
          <h2>Categories</h2>
          <div class="d-inline">
            <a href="{{ route('categories.trashed') }}"><button class="btn btn-sm btn-secondary">Trashed Categories</button></a>
          </div>
        </div>

        <div class="card-body">
          <div class="responsive-data-table">
            {{ $dataTable->table(['class' => 'table dt-responsive']) }}
          </div>
        </div>

      </div> 
    </div>  
      <div class="col-md-3">
        <div class="card">
            <div class="card-header card-header-border-bottom d-flex">
            Add Category
            </div>

          <div class="card-body">
          
                  <form action="{{ route('categories.store') }}" method="POST">
                      @csrf
                      <div class="mb-3">
                          <label for="nameInput" class="form-label">Category Name</label>
                          <input type="text" name="category_name" class="form-control" id="nameInput" aria-describedby="nameHelp" required>
                          @error('category_name')
                          <span class="text-danger"> {{ $message }}</span>
                          @enderror
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
          </div>
        </div>
      </div>

      
  </div> 
@endsection
