@extends('admin.admin_master')

@section('admin')

<div class="breadcrumb-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Contact Page</li>
      <li class="breadcrumb-item active" aria-current="page">Messages</li>
    </ol>
  </nav>
</div>
    <div class="row">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Messages</h2>
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