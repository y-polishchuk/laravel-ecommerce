@extends('admin.admin_master')

@section('admin')

<div class="breadcrumb-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Blog</li>
      <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
      <li class="breadcrumb-item active" aria-current="page">Trashed Categories</li>
    </ol>
  </nav>
</div>
    <div class="row">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Trashed Categories</h2>
            <div class="d-inline">
            <a href="{{ route('categories') }}"><button class="btn btn-sm btn-info mr-3">Published Categories</button></a>
            </div>
          </div>

          <div class="card-body">
            <div class="responsive-data-table">
              {{ $dataTable->table(['class' => 'table dt-responsive']) }}
            </div>
          </div>

        </div>  

      </div> 
    </div> 

@endsection