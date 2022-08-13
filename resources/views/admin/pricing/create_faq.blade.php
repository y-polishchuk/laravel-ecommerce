@extends('admin.admin_master')

@section('admin')

<div class="col-lg-6">
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Create FAQ</h2>
    </div>
    <div class="card-body">
    <form action="{{ route('faq.store') }}" method="POST">
    @csrf
<div class="form-group">
    <label for="formControlTextarea1">Question</label>
    <textarea class="form-control" id="formControlTextarea1" rows="2" name="question" placeholder="Question"></textarea>
</div>
@error('question')
    <span class="text-danger"> {{ $message }}</span>
@enderror
<div class="form-group">
    <label for="formControlTextarea2">Answer</label>
    <textarea class="form-control" id="formControlTextarea2" rows="2" name="answer" placeholder="Answer"></textarea>
</div>
@error('answer')
    <span class="text-danger"> {{ $message }}</span>
@enderror

<div class="form-footer pt-4 pt-5 mt-4 border-top">
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
</div>
        </form>
    </div>
</div>

@endsection