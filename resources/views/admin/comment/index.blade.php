@extends('admin.admin_master')

@section('admin')

<div class="breadcrumb-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Blog</li>
      <li class="breadcrumb-item active" aria-current="page">Comments</li>
    </ol>
  </nav>
</div>
    <div class="row">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Comments</h2>
            <div class="d-inline">
            <a href="{{ route('admin.comments.trashed') }}"><button class="btn btn-sm btn-secondary">Trashed Comments</button></a>
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