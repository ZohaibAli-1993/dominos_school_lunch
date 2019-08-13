@extends('layouts.app')

@section('content')

@include('partials.flash')
<div id="schools_help">
	<h1 class="h1">School Help</h1>
	<div class="container">
		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
					    <h3><i class="fas fa-address-card"></i> Sign up - Step 1</h3>
					</div><!-- /card header-->
					<div class="card-body">
						Sign up for a free account with the representative contact details<br/>
						A token of your school will be sent to the representative's email.
					</div><!-- /card body-->
					
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="fas fa-user-plus"></i> Add classroom - Step 2</h3>
					</div>

					<div class="card-body">
						You need to add classroom, so that parents can add their kids before they place lunch orders.<br/>
						Classrooms can be added manually or from a csv file.
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="far fa-calendar-check"></i> Even date - Step 3</h3>
					</div>

					<div class="card-body">
						Choose a date for your lunch event from a carlendar.<br/>
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->
		</div><!-- /row-->

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="fas fa-chevron-circle-down"></i> Select menu - Step 4</h3>
					</div>

					<div class="card-body">
						You are able to pickup disks from Domino's menu to your school lunch menu.<br/>
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="fas fa-tags"></i> Markup Price - Step 5</h3>
					</div>

					<div class="card-body">
						Decide your markup price to sell lunches to parents.<br/>
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="fas fa-clipboard-check"></i> Confirm order - Step 6</h3>
					</div>

					<div class="card-body">
						Confirm your order to make it available to parents.<br/>
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->
		</div><!-- /row-->

	</div><!-- /container-->
	
</div>
@endsection