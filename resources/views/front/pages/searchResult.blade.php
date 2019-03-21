@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <h1 class="my-4 text-info">Showing you
      <small>search results :</small>
      </h1>
      
      <!-- Blog Post -->
      @if( $posts->count() != 0)
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
      @else
      <div class="container center"> 
      <h2 class="text-danger text-center"> No result found</h2> 
        <a href="{{url('/')}}" class="btn btn-primary"> Go Back Home</a>
   
     
     </div>
       @endif
      
      {{ $posts->links() }} <br> <br> <br> <br>
    </div>
    <!-- Sidebar Widgets Column -->
   
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection