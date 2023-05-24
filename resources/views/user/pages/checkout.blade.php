@extends('user.user_master')

@section('user')

    <div class="invoice-wrapper rounded border bg-white py-5 px-3 px-md-4 px-lg-5">
      <div class="d-flex justify-content-between">
        <h2 class="text-dark font-weight-medium">Invoice</h2>
        <!-- <div class="btn-group">
          <button class="btn btn-sm btn-secondary">
            <i class="mdi mdi-content-save"></i> Save</button>
          <button class="btn btn-sm btn-secondary">
            <i class="mdi mdi-printer"></i> Print</button>
        </div> -->
      </div>
      <div class="row pt-5">
        <div class="col-xl-3 col-lg-4">
          <p class="text-dark mb-2">From</p>
          <address>
            AREY
            <br> {{ strip_tags($contacts->address) }}
            <br> Email: {{ $contacts->email }}
            <br> Phone: {{ $contacts->phone }}
          </address>
        </div>
        <div class="col-xl-3 col-lg-4">
          <p class="text-dark mb-2">To</p>
          <address>
            {{ auth()->user()->name }}
            <br> Email: {{ auth()->user()->email }}
            <br> Phone: {{ auth()->user()->mobile }}
          </address>
        </div>
        <div class="col-xl-3 col-lg-4">
          <p class="text-dark mb-2">Details</p>
          <address>
            Invoice:
            <br> {{ \Carbon\Carbon::now()->toFormattedDateString() }}
          </address>
        </div>
      </div>
      <table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
        <thead>
          <tr>
            <th>Subscribtion Item</th>
            <th>Description</th>
            <th>Is Advanced</th>
            <th>Unit Cost</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $plan->title }}</td>
            <td>{!! $plan->features !!}</td>
            <td>{{ $plan->advanced ? 'Advanced' : 'Not' }}</td>
            <td>${{ $plan->price }}.00</td>
            <td><a href="{{ route('page.pricing') }}" onclick="return confirm('Are you sure, you want to go back to Pricing?')" class="btn btn-sm btn-info">Pricing Page</a></td>
          </tr>
        </tbody>
      </table>
      <div class="row justify-content-end">
        <div class="col-lg-5 col-xl-4 col-xl-3 ml-sm-auto">
          <ul class="list-unstyled mt-4">
            <li class="pb-3 text-dark">Total
              <span class="d-inline-block float-right">${{ $plan->price }}.00</span>
            </li>
          </ul>
          <form action="{{ route('payment.step') }}" method="POST">
            @csrf
            <input type="hidden" name="price_id" value="{{ $plan->price_id }}">
            @if ($plan->price_id == 'none')
            <button type="submit"  class="btn btn-block mt-2 btn-lg btn-primary btn-pill">Get A Free Plan</button>
            @else
            <button type="submit"  class="btn btn-block mt-2 btn-lg btn-primary btn-pill">Procced to Payment</button>
            @endif
          </form>
        </div>
      </div>
    </div>

@endsection