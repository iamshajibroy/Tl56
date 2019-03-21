@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <h1 class="my-4">Showing post 
      <small>as category </small>
      </h1>
      <!-- Blog Post -->
      @if($posts->count()<=0)
      
      <div class="alert alert-danger"> No records available </div>
      @else
      @foreach($posts as $post)
      <div class="card mb-4">
        @if (session()->has('message'))
        <div class="alert alert-warning">
          {{ session()->get('message') }}
        </div>
        @endif
        
        <img class="card-img-top" src="{{ asset('images/front/posts/'.$post->image) }}" style="width: 200px; height:auto;" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{ $post->title}}</h2>
          <p class="card-text"> Rent: {{$post->rent}} (Tk) </p>
          <a href="{{url('/post/detail', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on: <strong> {{$post->created_at->diffForHumans() }} </strong>
          
        </div>
      </div>
      @endforeach
      @endif
      {{--  {{ $posts->links() }} --}}
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-info" type="button">Go!</button>
            </span>
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
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection