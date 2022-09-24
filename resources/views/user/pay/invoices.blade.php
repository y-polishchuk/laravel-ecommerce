@extends('user.user_master')

@section('user')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        
        <h4>Invoice Page</h4>
        <br><br>

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Invoices</div>

<table class="table">
<thead>
    <tr>
      <th scope="col" width="10%">Date</th>
      <th scope="col" width="15%">Price</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
<tbody>
@foreach ($invoices as $invoice)
    <tr>
        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
        <td>{{ $invoice->total() }}</td>
        <td><a href="/user/invoice/{{ $invoice->id }}">Download</a></td>
    </tr>
    @endforeach
</tbody>
</table>
{{ $invoices->links() }}
            </div>
    
        </div>
        </div>
        </div>
    </div>
@endsection