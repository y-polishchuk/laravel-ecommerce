@extends('admin.admin_master')

@section('admin')

<div class="breadcrumb-wrapper">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Contact Page</li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
  </nav>
</div>
    <div class="row">

      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2>Profile</h2>
            <a href="{{ route('contact.add') }}"><button class="btn btn-info">Add Contact</button></a>
          </div>

          <div class="card-body">
            <div class="responsive-data-table">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" width="15%">Contact Address</th>
                  <th scope="col" width="20%">Contact Email</th>
                  <th scope="col" width="25%">Contact Phone</th>
                  <th scope="col" width="15%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contacts as $contact) 
                <tr>                
                  <td> {!! $contact->address !!} </td>
                  <td> {{ $contact->email }} </td>
                  <td> {{ $contact->phone }} </td>
                  
                <td><a href="{{ route('contact.edit', $contact) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('contact.delete', $contact) }}" onclick="return confirm('Are you sure, you want to delete this Contact?')" class="btn btn-danger">Delete</a>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
          </div>

        </div>  

      </div> 
    </div> 

@endsection