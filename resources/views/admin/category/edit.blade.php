@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="container-fluid">
      <!-- general form elements -->
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <div class="box-header">
            <h3 class="box-title">Edit Category Info</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @if (Session::has('success'))
          <div class="alert alert-success">
          <strong>{{ Session::get('success')}} </strong> </div>
          @endif
          
          <form role="form" action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/from-data">
            @csrf
        @method('PUT')
            <div class="box-body">
              <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}" >
                <label>Category Name <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
                <input type="text" name="category_name" class="form-control"  value=" {{ $category->category_name }}" >
                @if ($errors->has('category_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('category_name') }}</strong>
                </span>
                @endif
              </div>
            <div class="form-group {{ $errors->has('category_details') ? ' has-error' : '' }} ">
                    <label>Description</label>
                     <textarea class="form-control  "  name="category_details" cols="30" rows="5" value="">{{ $category->category_details}}</textarea>
                   @if ($errors->has('category_details'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category_details') }}</strong>
                        </span>
                   @endif
                </div>
              
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-info" onClick="window.location.href='/admin/category'">Go back</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection