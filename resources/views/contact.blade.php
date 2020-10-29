@extends('main')

@section('title','| Contact')

@section('content')

<div class="row marg">
  <div class="col-md-8">
    <h2 class="text-capitalize">contact</h2>
<hr>
<form action="{{ url('contact')}}" method="POST">
{{ csrf_field() }}
  <div class="form-group input-group-sm">
    <label name="email" for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group input-group-sm">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject">
  </div>
  <div class="form-group input-group-lg">
    <label for="message">Message</label>
    <textarea name="message" id="message" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>
</div>


    
@endsection