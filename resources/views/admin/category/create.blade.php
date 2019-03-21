@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="container-fluid">
      <!-- general form elements -->
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
          <div class="box-header">
            <h3 class="box-title">Add New Category</h3>
            <div class="pull-right">      <a href="{{url('admin/category')}}" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-plus-square"></i>
                Category List
            </a>
          </div>
        </div>
        
        
        @include('admin.layouts.message')
        <form role="form" action="/admin/category" method="POST" enctype="multipart/from-data">
          @csrf()
          <div class="box-body">
            <div class="form-group {{ $errors->has('category_name') ? ' has-error' : '' }}" >
              <label>Category Name <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
              <input type="text" name="category_name" class="form-control"  value="{{ old('category_name') }}" placeholder="Enter a name">
              @if ($errors->has('category_name'))
              <span class="help-block">
                <strong>{{ $errors->first('category_name') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('category_details') ? ' has-error' : '' }}">
              <label>Description</label>
              <textarea class="form-control" name="category_details" cols="30" rows="3" placeholder="Enter   details"></textarea>
              @if ($errors->has('category_details'))
              <span class="help-block">
                <strong>{{ $errors->first('category_details') }}</strong>
              </span>
              @endif
            </div>
            
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection