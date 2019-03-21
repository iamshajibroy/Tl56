@if ( session()->has('message') )
<div class="alert alert-danger">{{ session()->get('message') }}</div>
@endif
@if ( session()->has('msg') )
<div class="alert alert-success">{{ session()->get('msg') }}</div>
@endif
@if (Session()->has('success'))
<div class="alert alert-success">
<strong>{{ Session()->get('success')}} </strong> </div>
@endif