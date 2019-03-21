@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->  <br><br>
<div class="row">
  <div class="col-md-12" id="register">
    <div class="card col-md-6 offset-md-2">
      <div class="card-body">
        <h2 class="card-title">Login</h2>
        <h6>Insert valid  creadentials </h6>
        <hr>
        @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-danger">
          {{ session()->get('message') }}
        </div>
        @endif
        <form action="/login" method="post">
          @csrf
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Email" id="email" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" id="password"
            class="form-control" required="required">
          </div>
          <div class="form-group">
            <button class="btn btn-outline-info col-md-2"> Login</button>
            <a class="btn btn-link" href="{{ route('password.request') }}">
              Forgot Your Password?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> <br> <br>
@endsection
<br> <br>