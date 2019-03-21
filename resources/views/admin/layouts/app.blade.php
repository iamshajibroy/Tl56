
	<!DOCTYPE html>
	<html>
	<head>
		@include('admin.layouts.head')
		<title></title>
	</head>
	   <body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
	   @include('admin.layouts.header')
	   

	   @include('admin.layouts.mainSidebar')


	   @section('main-content')
	       @show
	     

	   @include('admin.layouts.footer')

	   @section('script')
	   @show
	</div>
	</body>
	</html>
	