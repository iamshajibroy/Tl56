@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->  <br><br>
<div class="row"> 
  <div class="col-md-12" id="register">
    <div class="card col-md-6 offset-md-2">
      <div class="card-body">
        <h2 class="card-title">Create a new account</h2> 
        <h6>Please provide required information </h6>
        <hr>
        
        <form action="{{route('register')}}" method="post">
          @csrf
          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Name" id="name" class="form-control">
            @if ($errors->has('name'))
            <span class="text-danger">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Email" id="email" class="form-control" required="required">
            @if ($errors->has('email'))
            <span class="text-danger">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" id="password" class="form-control" required="required">
            @if ($errors->has('password'))
            <span class="text-danger">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control" required="required">
            @if ($errors->has('password_confirmation'))
            <span class="text-danger">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
            <label for="address">Address:</label>
            <textarea name="address" placeholder="Address" id="address" class="form-control" required="required"></textarea>
            @if ($errors->has('address'))
            <span class="text-danger">
              <strong>{{ $errors->first('address') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <button class="btn btn-outline-info col-md-2"> Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> <br> <br>
@endsection