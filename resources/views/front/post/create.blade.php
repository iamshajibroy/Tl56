@extends('front.layouts.app')
@section('main-content')
<!-- Page Content -->  <br><br>
<div class="row">
  <div class="col-md-12" id="register">
    <div class="card col-md-6 offset-md-2">
      <div class="card-body">
        <h2 class="card-title">Post your ad. right now</h2>
        <h6>Please provide required information </h6>
        <hr>
        
        
        @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-danger">
          {{ session()->get('message') }}
        </div>
        @endif
        <form action="/adPost" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title">Title <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Set a title">
            @if ($errors->has('title'))
            <span class="text-danger">
              <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
            <label for="start_date">Available from</label>
            <input type="text" class="form-control" name="start_date" id="datepicker" placeholder="Start Date" value="{{ old('start_date') }}">
            @if ($errors->has('start_date'))
            <span class="text-danger">
              <strong>{{ $errors->first('start_date') }}</strong>
            </span>
            @endif
          </div>
          
          <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label for="category_id">Category <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
            <select id="category_id" name="category_id" class="form-control">
              <option value="">Select Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected":"" }}>
              {{ $category->category_name }}</option>
              @endforeach
            </select>
            @if ($errors->has('category_id'))
            <span class="text-danger">
              <strong>{{ $errors->first('category_id') }}</strong>
            </span>
            @endif
          </div>
          
          
          <div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
            <label for="rent">Rent (TK) <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
            <input type="number" step="any" min="0" class="form-control" id="rent" name="rent" value="{{ old('rent') }}" placeholder=" House rent">
            @if ($errors->has('rent'))
            <span class="text-danger">
              <strong>{{ $errors->first('rent') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="house_details">House Details</label>
            <textarea class="form-control" id="house_details" name="house_details" placeholder="Provide Details" rows="3" cols="30">{{ old('house_details') }}</textarea>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" placeholder="Your address" rows="3" cols="30">{{ old('address') }}</textarea>
          </div>
          
           <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
            <label for="cell">Emergency contact <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" cell="Required"></i></label>
            <input type="text" class="form-control" id="cell" name="cell" value="{{ old('cell') }}" placeholder="+8801700000013">
            @if ($errors->has('cell'))
            <span class="text-danger">
              <strong>{{ $errors->first('cell') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            <label for="product_image">Available Photo</label>
            <input type="file" name="image" id="product_image" onchange="readURL(this);">
            <br>
            <img id="blah" src="#" alt="" /> <br>
          </div>
          <div class="form-group">
            <button class="btn btn-outline-success col-md-4 offset-md-4"> Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> <br> <br>
@endsection
@section('script')
<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#blah')
.attr('src', e.target.result)
.width(150)
.height(125);
};
reader.readAsDataURL(input.files[0]);
}
}
</script>
<script>
$( function() {
$( "#datepicker" ).datepicker({
dateFormat: 'yy-mm-dd',
changeMonth: true,
changeYear: true,
});
} );
</script>
@endsection