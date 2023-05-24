@extends('user.user_master')

@section('user')

<div class="breadcrumb-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Invoices</li>
    </ol>
  </nav>
</div>
    <div class="row">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Invoices</h2>
            <div class="d-inline">
            <a href="{{ route('unsubscribe') }}"><button class="btn btn-danger" onclick="return confirm('Are you sure, you want to Unsubscribe?')">Unsubscribe</button></a>
            </div>
          </div>

          <div class="card-body">
            <div class="responsive-data-table">
            
                <table id="invoices-table" class="table dt-responsive">
                    <thead>
                        <tr>
                            <th>Invoice Number</th>
                            <th>Amount Paid</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
          </div>

        </div>  

      </div> 
    </div>
@endsection