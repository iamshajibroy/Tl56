@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      
      <!-- Blog Post -->
      <div class="card mb-6 offset-md-3" style="text-align: center; color: red;">
        <h1 class="my-4"> 404 Error! </h1> <h2 class="my-4"> Page not Found</h2 class="my-4">
         <div class="card-body">
          <h2 class="card-title"> </h2> 
          
        </div>
        <div class="card-footer text-muted">
           <a class="btn btn-outline-primary col-md-6" href="{{url('/')}}">Go Back Home</a>
           </div>
      </div>
      
      
    </div>
    
      
    </div>
  </div>
  <!-- /.row -->
 
<!-- /.container -->
@endsection