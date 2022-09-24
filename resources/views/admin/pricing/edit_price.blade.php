@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Edit Price</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('price.update', $price->id) }}" method="POST">
    @csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Unit Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $price->title }}">
</div>
@error('title')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput2">Unit Price_id</label>
    <input type="text" name="price_id" class="form-control" id="exampleFormControlInput2" value="{{ $price->price_id }}">
</div>
@error('price_id')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlInput3">Unit Price</label>
    <input type="text" name="price" class="form-control" id="exampleFormControlInput3" value="{{ $price->price }}">
</div>
@error('price')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="exampleFormControlTextarea1">Features</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="features">{{ $price->features }}</textarea>
</div>
@error('features')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="FormControlSelect1">Advanced</label>
<select id="FormControlSelect1" name="advanced">
@if($price->advanced == false)
  <option value="1">True</option>
  <option value="0" selected="selected">False</option>
@else
  <option value="1" selected="selected">True</option>
  <option value="0">False</option>
@endif
</select>
<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection