@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <h1 class="card-title">{{ $post->title}} </h1>
        
        <div class="card-body"><img class="tumbnail" src="{{asset('/images/front/posts/'.$post->image)}}" style="height:auto; width:300px;" alt="Post image">
          <div class="card-text">
            <br>
            <p>House details: <strong> {{$post->house_details}}</strong></p> <br>
            <p>Address: <strong> {{$post->address}}</strong></p>
            Available From: {{ $post->start_date}}
          </div>
          <div class="card-footer">
            <p class="float-left"> Posted on {{$post->created_at->diffForHumans()}} by
            <strong>{{$post->user->name}} </p>
            <p class="float-right">
              
            Rent: <strong> {{ $post->start_date }}</strong> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <h4 >Categories</h4>
      
           <ul>
        
        @foreach($categories as $category)
        <li class="list-unstyled">
        <a href="{{url('/by-category', $category->id)}}">{{ $category->category_name}}</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
@endsection