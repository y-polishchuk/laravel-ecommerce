@extends('admin.admin_master')

@section('admin')

    <div class="breadcrumb-wrapper">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active" aria-current="page">All Sliders</li>
        </ol>
      </nav>
    </div>
        <div class="row">

          <div class="col-md-12">
            <div class="card card-default">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>All Sliders</h2>
                <a href="{{ route('sliders.add') }}"><button class="btn btn-info">Add Slider</button></a>
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