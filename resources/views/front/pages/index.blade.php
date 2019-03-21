@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <h1 class="my-4">See
      <small>Latest Post</small>
      </h1>
      <!-- Blog Post -->
      @foreach($posts as $post)
      <div class="card mb-4">
        @if (session()->has('message'))
        <div class="alert alert-warning">
          {{ session()->get('message') }}
        </div>
        @endif
        <div class="col-md-2"></div>
        <div class="col-md-10">
          <div class="hovereffect">
            <img class="img-responsive"  style="width: 500px; height:auto;" src="{{ asset('images/front/posts/'.$post->image) }}" alt="Image">
            <div class="overlay">
              <h2>{{ $post->title}}</h2> <br> <br> <br> <br>
              <a class="btn btn-info" href="{{url('/post/detail', $post->id)}}">View Details &rarr;</a>
            </div>
          </div>
          <h2 class="card-title">{{ $post->title}}</h2>
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
      @endforeach
      {{ $posts->links() }}
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
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection