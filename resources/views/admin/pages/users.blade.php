@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="content-header">
      
      <h3 style="text-align:center;" ">
      View all users </h3>
      @include('admin.layouts.message')
    </div>
    
    <div class="box-header">
      <h3 class="box-title">  </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="users" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Sl.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($users as $user)
            <td>{{$loop->iteration}}</td>
            <td>{{ $user->name }}</td>
            
            <td> {{ $user->email }}</td>
            <td>
              @if($user->image != '')
              <img src="{{ asset('images/front/user/'.$user->image) }}" class="avatar" height="50" width="auto" >
              @else
              <span class="text-warning">No Image</span>
              @endif
            </td>
            
            <td>
              
              {{--  <form method="user" id="delete-form-{{ $user->id }}" action="{{ url('admin/user', $user->id) }}" style="display: none;" >
                {{ csrf_field() }}
                {{ method_field('delete')}}
                
              </form>
              <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $user->id }}').submit();
              }else{
              event.preventDefault();
              }" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"  title="Delete" aria-hidden="true"></i></button> --}}
              
            </td>
            
            
          </tr>
          @endforeach
        </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>
@endsection
@section('script')
<script>
$(function () {
$('#users').DataTable({
});
});
</script>
@endsection