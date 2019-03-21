@extends('admin.layouts.app')
@section('main-content')
<div class="content-wrapper">
  <div class="box">
    <div class="content-header"><h3>
      Manage category
      </h3> <a href="{{url('admin/category/create')}}" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-plus-square"></i>
        Add category
      </a>  <hr></div>
      <div class="box-header">
        <h3 class="box-title">View Category list </h3>
        @include('admin.layouts.message')
        
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table id="category" class="table table-bordered table-striped" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="10%">Sl.</th>
                <th width="20%">Category Name</th>
                <th width="50%">Description</th>
                <th width="20%" >Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->category_name}}</td>
                <td>{{$category->category_details}}</td>
                
                
                <td>  <div class="btn-group">
                  <a href="{{route('category.edit', $category->id)}}" class="btn btn-xs btn-warning"><i aria-hidden="true" class="fa fa-pencil-square-o"></i> </a>
                  <a href="{{url('admin/category', $category->id)}}" class="btn btn-xs btn-info"><i aria-hidden="true" class="fa fa-eye"></i>  </a>
                  
                  <form method="POST" id="delete-form-{{ $category->id }}" action="{{ url('admin/category', $category->id) }}" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('delete')}}
                    
                  </form>
                  <button onclick="if(confirm('Are you Sure, You went to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $category->id }}').submit();
                  }else{
                  event.preventDefault();
                  }" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>  </button>
                </div>
              </td>
              @endforeach
            </tr>
          </div>
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
$('#category').DataTable({

});
});
</script>
@endsection