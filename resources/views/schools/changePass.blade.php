@extends('layouts.app')

@section('content')
@include('partials.flash')

<div class="container">
	<div class="row">
		<div class="col">
			<h3 class="h3">Change Password</h3>
		</div><!-- /col-->
	</div><!-- /row-->

	<div class="row">
		<div class="col changepass_cover">
			@include('partials.changePassForm')
			<a href="/schools/{{$school->idschool}}" class="button red cancel">Cancel</a>
		</div><!-- /col-->
	</div><!-- /row-->
</div><!-- /container-->

@endsection