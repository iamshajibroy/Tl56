@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="content-header">
      
      <h3 style="text-align:center;" ">
      View all posts </h3>
      @include('admin.layouts.message')
    </div>
    
    <div class="box-header">
      <h3 class="box-title">  </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Sl.</th>
            <th>Title</th>
            <th>Rent</th>
            <th>Image</th>
            <th> Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($posts as $post)
            <td>{{$loop->iteration}}</td>
            <td>{{ $post->title }}</td>
            
            <td> {{ $post->rent }}</td>
            <td>
              @if($post->image != '')
              <img src="{{ asset('images/front/posts/'.$post->image) }}" class="avatar" height="50" width="auto" >
              @else
              <span class="text-warning">No Image</span>
              @endif
            </td>
            <td>
              @if($post->status == 0)
              <span class="alert-danger"> Not Published</span>
              @else
              <span class="alert-success">Published</span>
              @endif
            </td>
            <td>
              @if($post->status == 0)
              <a href="{{URL('/published', $post->id)}}" class="btn btn-xs btn-success"><i aria-hidden="true" class="fa fa-thumbs-up" title="Publish"></i></a>
              @else
              <a href="{{url('/unpublished', $post->id)}}" class="btn btn-xs btn-warning"><i aria-hidden="true" class="fa fa-thumbs-down" title="Unpublish"></i></a>
              
              @endif
              <a href="{{route('post.show', $post->id)}}" class="btn btn-xs btn-info"><i aria-hidden="true" class="fa fa-eye" title="Show"></i></a>

             {{--  <form method="POST" id="delete-form-{{ $post->id }}" action="{{ url('admin/post', $post->id) }}" style="display: none;" >
                {{ csrf_field() }}
                {{ method_field('delete')}}
                
              </form>
              <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $post->id }}').submit();
              }else{
              event.preventDefault();
              }" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"  title="Delete" aria-hidden="true"></i></button> --}}
              
            </td>
            
            
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
           <th>Sl.</th>
            <th>Title</th>
            <th>Rent</th>
            <th>Image</th>
            <th> Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>
@endsection
@section('script')
<script>
$(function () {
$('#posts').DataTable({
});
});
</script>
@endsection