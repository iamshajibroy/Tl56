@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
       @if (session()->has('message'))
        <div class="alert alert-warning">
          {{ session()->get('message') }}
        </div>
        @endif
      <h1 class="my-4">   Viewing details
      </h1>
      <!-- Blog Post -->
      
      <div class="card mb-4">
        
        <div class="col-md-2"></div>
        <div class="col-md-10">
          
          <img class="img-responsive"  style="width: 500px; height:auto;" src="{{ asset('images/front/posts/'.$post->image) }}" alt="Image">
          
          
          <h2 class="card-title">{{ $post->title}}</h2>
          <br>
          <div class="card-body"> House Details: <p> {{ $post->house_details}} <p> <br>
            Address : <strong> {{ $post->address }} </strong>  <br>
            Available from : <strong>{{ $post->start_date }}</strong> <br>
            Mobile Number : <strong> {{ $post->cell }}</strong>

           </div> 
          
          <div class="card-footer">
            <div class="float-left">
              Rent: <strong> {{$post->rent}} (Tk)</strong>
            </div>
            <div class="float-right">
              Posted on: <strong> {{$post->created_at->diffForHumans() }} </strong>
            </div>
            
            
            
          </div>
        </div>
        
        
      </div>
      
      
      
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <form method="post" action="{{ url('/search') }}">
            @csrf
            <div class="input-group">
              <input type="text" name="query" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-info" type="submit">Go!</button>
              </span>
              @if ($errors->has('query'))
              <span class="text-danger">
                <strong>{{ $errors->first('query') }}</strong>
              </span>
              @endif
            </div>
          </form>
        </div>
      </div>
      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-5 offset-lg-2">
              <ul class="list-unstyled mb-0">
                
                @foreach($categories as $category)
                <li>
                  <a href="{{url('/by-category', $category->id)}}">{{ $category->category_name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Add Button -->
      <div class="card my-4">
        <h5 class="card-header">Post Your ad. right now</h5>
        <div class="card-body">
          <a class="btn btn-primary btn-block"  href="{{url('/adPost')}}">Post AD. <br>  </a>
        </div>
      </div>
      <!-- Side Widget -->

    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection