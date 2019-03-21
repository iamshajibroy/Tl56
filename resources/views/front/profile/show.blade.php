@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      
      <!-- Blog Post -->
      <div class="card mb-4 offset-md-3">
        <h1 class="my-4">{{ $post->title}}
        </h1>
        <img class="tumbnail" src="{{asset('/images/front/posts/'.$post->image)}}" style="height:auto; width:260px;" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title"> </h2>
          <p class="card-text">House details: <strong> {{$post->house_details}}</strong></p>
          
        </div>
        <div class="card-footer text-muted">
          <p> House Rent : <strong> {{$post->rent}} TK</strong> </p>
          Posted on {{$post->created_at->diffForHumans()}} by
          <strong>{{$post->user->name}}
            </strong>
        </div>
      </div>
      
      
    </div>
    
      
      
    </div>
  </div>
  <!-- /.row -->
 
<!-- /.container -->
@endsection