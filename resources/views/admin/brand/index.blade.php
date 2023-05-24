@extends('admin.admin_master')

@section('admin')

    <div class="breadcrumb-wrapper">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active" aria-current="page">Brands</li>
        </ol>
      </nav>
    </div>
        <div class="row">

          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header card-header-border-bottom d-flex justify-content-between">
                <h2>Brands</h2>
                <button type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#addBrandForm">
                  Add Brand
                </button>
              </div>

              <div class="card-body">
                <div class="responsive-data-table">
                  {{ $dataTable->table(['class' => 'table dt-responsive']) }}
                </div>
              </div>

            </div>  

          </div> 
        </div> 



<!-- Form Modal -->
<div class="modal fade" id="addBrandForm" tabindex="-1" role="dialog" aria-labelledby="addBrandFormTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandFormTitle">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
              <div class="mb-3">
                  <label for="nameInput" class="form-label">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" id="nameInput" aria-describedby="nameHelp">
                  @error('brand_name')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror
              </div>

              <div class="mb-3">
                  <label for="imageInput" class="form-label">Brand Image</label>
                  <input type="file" name="brand_image" class="form-control" id="imageInput" aria-describedby="imageHelp">
                  @error('brand_image')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror
              </div>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-pill">Add Brand</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection