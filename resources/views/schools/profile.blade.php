@extends('layouts.app')

@section('content')

@include('partials.flash')
<h1 id="school_profile_tile">{{$school->school_name}} Profile</h1>

<div id="school_profile" class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="profile_table">
			<table>
				
				<tr>
					<th>School name</th>
					<td>{{$school->school_name}}</td>
				</tr>

				<tr>
					<th>Address</th>
					<td>{{$school->adress}} {{$school->city}}, {{$school->province}}, {{$school->postal_code}}</td>
				</tr>
				<tr>
					<th>Coordinator Name</th>
					<td>{{$school->coordinator_first_name}} {{$school->coordinator_last_name}}</td>
				</tr>

				<tr>
					<th>Phone</th>
					<td>{{$school->phone}}</td>
				</tr>

				<tr>
					<th>Email</th>
					<td>{{$school->email}}</td>
				</tr>

				<tr>
					<th>Store Name</th>
					<td>{{$stores[$school->idstore]}}</td>
				</tr>

				<tr>
					<th>Markup Price</th>
					<td>{{$school->markup}}%</td>
				</tr>
			</table>
		</div><!-- /col-->
	</div><!-- /row-->

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="button">
			<a class="button edit" href="/school/{{$school->idschool}}/edit">Edit</a>
			<a class="button changepass" href="/school/{{$school->idschool}}/changepass">Change Password</a>
		</div><!-- /col-->
	</div><!-- /row-->
	
</div>

@endsection