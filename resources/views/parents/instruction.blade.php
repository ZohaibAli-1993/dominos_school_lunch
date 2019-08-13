@extends('layouts.app')

@section('content')

@include('partials.flash')
<div id="parents_help">
	<h1 class="h1">Parents Help</h1>
	<div class="container">
		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
					    <h3><i class="fas fa-address-card"></i> Sign up</h3>
					</div><!-- /card header-->
					<div class="card-body">
						Sign up for a free account to process your lunch order for kids.<br/>
						We need your name, email address and phone number as your contact details.
					</div><!-- /card body-->
					
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="fas fa-user-plus"></i> Add your children</h3>
					</div>

					<div class="card-body">
						Add your school token to identify your kid's school.<br/>
						Enter your kid's name and select classroom from the list.
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3><i class="fas fa-money-check-alt"></i> Place Order</h3>
					</div>

					<div class="card-body">
						Select food your kid from the school menu. <br/>
						Pay online and you will have a school lunch for your kid.<br/>
						Please be notice, it is impossible to cancel your order after cutoff time.
					</div>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			
		</div><!-- /row-->
	</div><!-- /container-->
</div>	

@endsection