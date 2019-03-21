<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>To-Let - Start Posting Today</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('front/css/blog-home.css')}}" rel="stylesheet">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>
  <body> <br><br>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">To-Let - Start Posting Today</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/how-to-use')}}">How to Use</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> {{ auth()->check() ? auth()->user()->name : 'Account' }}
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                @if (!auth()->check())
                <a class="dropdown-item " href="{{  url('/login') }}">Sign In</a>
                <a class="dropdown-item" href="{{  url('/register') }}">Sign Up</a>
                @else
                <a class="dropdown-item" href="{{  url('/profile') }}"><i class="fa fa-user"></i> Profile</a>
                <hr>
                <a class="dropdown-item" href="{{  url('/logout') }}"><i class="fa fa-lock"></i> Logout</a>
                @endif
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>