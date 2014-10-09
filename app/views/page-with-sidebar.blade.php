@extends('skeleton')
@section('container')
<div class="row">
	<div class="col-lg-8">
	 	@yield('content')
	</div>
	<div class="col-lg-4">
		@yield('sidebar')
	</div>
</div>
@stop