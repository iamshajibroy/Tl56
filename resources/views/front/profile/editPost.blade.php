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
				<form action="{{route('updatePost', $post->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					{{ method_field('PATCH') }}
					<div class="box-body">
						<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title">Product Name <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
							<input type="text" class="form-control" id="protitle" name="protitle" value="{{ $post->title }}" placeholder="post Name">
							@if ($errors->has('title'))
							<span class="help-block">
								<strong>{{ $errors->first('title') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
							<label for="rent">Rent (Tk) <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
							<input type="number" step="any" min="0" class="form-control" id="rent" name="rent" value="{{ $post->rent }}" placeholder=" post Code">
							@if ($errors->has('rent'))
							<span class="help-block">
								<strong>{{ $errors->first('rent') }}</strong>
							</span>
							@endif
						</div>
						
						<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
							<label for="category_id">Category <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></label>
							<select id="category_id" name="category_id" class="form-control">
								<option value="">Select Category</option>
								@foreach ($categories as $category)
								<option value="{{ $category->id }}" {{ $post->category_id == $category->id ? "selected":"" }}> {{ $category->category_name }} </option>
								@endforeach
							</select>
							@if ($errors->has('category_id'))
							<span class="help-block">
								<strong>{{ $errors->first('category_id') }}</strong>
							</span>
							@endif
						</div>
						
						
						<div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
							<label for="cell">Emergency contact <i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" cell="Required"></i></label>
							<input type="text" class="form-control" id="cell" name="cell" value="{{ $post->cell }}" >
							@if ($errors->has('cell'))
							<span class="text-danger">
								<strong>{{ $errors->first('cell') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group">
							<label for="house_details">House Details</label>
							<textarea class="form-control" id="house_details" name="house_details" placeholder="post Details" rows="3" cols="50">{{ $post->house_details }}</textarea>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea class="form-control" id="address" name="address" placeholder="Your address" rows="3" cols="30">{{ $post->address }}</textarea>
						</div>
						<div class="form-group">
							<label for="post_image">post Image</label>
							<input type="file" name="post_image" id="post_image" onchange="readURL(this);">
							<br>
							<img id="blah" src="{{ asset('images/front/posts/'.$post->image) }}" alt="" style="width: 150px; height: 125px;"/>
						</div>
						<button type="submit" class="btn btn-success">Update</button>
						<button type="button" class="btn btn-danger" onClick="window.location.href='/profile'">Cancel</button>
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