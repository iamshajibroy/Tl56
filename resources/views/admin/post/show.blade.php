@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="container-fluid">
      <!-- general form elements -->
      
      <div class="box-header">
        
        
        <a href="{{'/admin/post'}}" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-tasks"></i>
        Manage posts</a>
      </div>
      <div class="row">
        <h2 style="text-align: center;" >Post Detail Info</h2><hr>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
          <h4><strong>Post photo</strong></h4>
          @if($post->image != '')
          <img src="{{ asset('/images/front/posts/'.$post->image) }}" class="thumbnail" height="150" width="auto" >
          @else
          <span class="alert-warning">No Image Provided</span>
          @endif
        </div>
        <div class="col-sm-5 offset-sm-2">
          <div class="box-body">
            
            <table class="table table-bordered table-striped table-hover"><tbody>
              <tr><td><strong>Title:</strong> {{ $post->title}}</td></tr>
              <tr><td><strong>Location :</strong> {{ $post->address }}</td></tr>
              <tr><td><strong>Rent :</strong> {{ $post->rent }} (TK) </td> </tr>
              <tr><td><strong>Available from:</strong> {{ $post->start_date }} </td> </tr>
              <tr><td><strong>Posted by:</strong> {{ $post->user->name }} </td> </tr>
              <tr><td><strong>Description :</strong> {{ $post->house_details }} </td>  </tr>
              
              <tr><td><strong>Publication status : </strong>
                @if($post->status == 0)
                <span class="alert-warning"> Not Published</span>
                @else
                <span class="alert-success"> Published</span>
              </td>  </tr>
              @endif
            </tbody></table>
          </div>
          <div class="box-footer">
            <a href="{{url('/admin/post')}}" class="btn btn-primary">Go Back</a>
          </div>
        </div>
        
        
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection