@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->  <br><br>
<div class="row">
  <div class="col-md-12" id="register">
    <div class="card col-md-8 offset-md-2">
      <div class="card-body">
        
        
        <h1 class="text-info"> Hello, {{ $user->name}} </h1> <br>
        @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
        @endif
        <div class="row">
          <div class="col-md-8">
            <table class="table table-bordered table-striped">
              <tr>
                <td> Email: {{$user->email}}</td>
              </tr>
              <tr> <td>
                Joined: {{ $user->created_at->diffForHumans() }}
              </td>    </tr>
            </table>
            </div> <div class="col-md-4">  <img src="{{ asset('/images/front/user/'.$user->image) }}" class="thumbnail" height="150" width="auto" > </div>
          </div>
        </div>
        <div class="card-body">
          
          <h4 class="title">Your posts</h4>
          
          <div class="content table-responsive table-full-width">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Title</th>
                  <th>Rent</th>
                  <th> Available from</th>
                  <th>Status</th>
                  <th> Action</th>
                  
                </tr>
              </thead>
              <tbody class="text-info" >
                <tr>
                  @foreach ($posts as $post)
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->rent}} TK</td>
                  <td>{{ $post->start_date}} TK</td>
                  
                  
                  <td>
                    @if ($post->status ==0)
                    <span class="badge badge-warning">Unpublished</span>
                    
                    @else
                    <span class="badge badge-success">Published</span>
                    
                    @endif
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ url('/post', $post->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                        View
                      </a>
                    {{--   <a href="{{ url('post-edit', $post->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Update">
                        Update
                      </a> --}}
                      <form action="{{ url('/post', $post->id) }}" id="delete-form-{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="if(confirm('Are you Sure, You went to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $post->id }}').submit();
                  }else{
                  event.preventDefault();
                  }" >Delete</button>
                      </form>
                    </div> 
                  </td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
            
            </div>
          </div> </div>
          <br> <br>
          @endsection