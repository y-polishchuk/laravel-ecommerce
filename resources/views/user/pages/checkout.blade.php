@extends('user.user_master')

@section('user')

  <div class="py-12">
        
    <div class="container">
      <div class="row">

        
        <h4>Checkout Page</h4>
        <br><br>

          <div class="col-md-12">
            <div class="card">

              <div class="card-header">Subscription Plan</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="15%">Plan Title</th>
      <th scope="col" width="10%">Price, $</th>
      <th scope="col" width="25%">Plan Features</th>
      <th scope="col" width="15%">Is Advanced</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody> 
    <tr>
      <td> {{ $plan->title }} </td>
      <td> {{ $plan->price }} </td>
      <td> {!! $plan->features !!} </td>
      <td> {{ $plan->advanced ? 'Advanced' : 'Not' }} </td>
    <td>
    <a href="{{ route('page.pricing') }}" onclick="return confirm('Are you sure, you want to go back to Pricing?')" class="btn btn-info">Pricing</a>
    </td>
    </tr>
  </tbody>
</table>
            </div>
    
          </div>
        </div>
    </div>
  </div>
    <br>
    <form action="{{ route('payment.step') }}" method="POST">
    @csrf
    <input type="hidden" name="price_id" value="{{ $plan->price_id }}">
    @if ($plan->price_id == 'none')
    <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">Get A Free Plan</button>
    </div>
    @else
    <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">To The Payment Step</button>
    </div>
    @endif

@endsection