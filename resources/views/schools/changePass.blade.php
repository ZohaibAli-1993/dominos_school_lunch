@extends('layouts.app')

@section('content')
@include('partials.flash')

<div class="container mt-5">
	<div class="row">
		<div class="col">
			<h1 class="h1"> {{$school->school_name}} </h1>
			<h3 class="h2 text-left">Change Password</h3>
		</div><!-- /col-->
	</div><!-- /row-->

	<div class="row">
		<div class="col changepass_cover">
			@include('partials.changePassForm')
			<a href="/schools/profile" class="button red cancel">Cancel</a>
		</div><!-- /col-->
	</div><!-- /row-->
</div><!-- /container-->

@endsection