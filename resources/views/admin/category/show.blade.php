@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="content-header"><h3>
      View Category details info
    </h3> </div>
    <div class="box-header">
      
      <div class="pull-right">      <a href="{{'/admin/category'}}" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-plus-square"></i>
      Go Back </a>
      
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
      
        <h2 style="text-align: center;">{{$category->category_name}}</h2>
        <hr>
        <div class="col-md-8 offset-md-3">
          
          <h5>Category details: </h5>
          <p>{{$category->category_details}}</p>
        </div>
      
      
    </div>
    <!-- /.box-body -->
  </div>
</div>
</div>
@endsection
@section('script')
<script>
</script>
@endsection