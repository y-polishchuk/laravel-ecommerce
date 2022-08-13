@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        
        <div class="container">
        <div class="row">

        <div class="col-md-9">
        <h4>FAQs</h4>
        </div>
        
        <div class="col-md-3">
        <a href="{{ route('faq.add') }}"><button class="btn btn-info">Add FAQ</button></a>
        </div>

        <div class="col-md-12">
        <div class="card">

        <div class="card-header">All FAQs</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="20%">Question</th>
      <th scope="col" width="20%">Answer</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
    @php($i = 1)
    @foreach($faqs as $faq) 
    <tr>
      <th scope="row"> {{ $i++ }} </th> 
      
      <td> {{ $faq->question }} </td>
      <td> {{ $faq->answer }} </td>
    <td><a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('faq.delete', $faq->id) }}" onclick="return confirm('Are you sure, you want to delete this FAQ?')" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

    </div>
    </div>
        </div>


    </div>

@endsection