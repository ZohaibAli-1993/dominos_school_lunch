@extends('layouts.app')

@section('content')

<!--*********Hero image and call to action************ -->
<img src="/img/hero_img.jpg" alt="hero image">



<!--*******Section 1: shipping, call number and Gift Cards********** -->
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<img src="" alt="shipping icon">
			<h3>Shipping</h3>
			<div>Available for all order</div>
		</div><!-- .col-->

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<img src="" alt="phone icon">
			<h3>Call Us At</h3>
			<div>1-866-903-1151</div>
		</div><!-- .col-->

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<img src="" alt="gift icon">
			<h3>Gift Cards</h3>
			<div>A gift for you in any amount</div>
		</div><!-- .col-->
	</div><!-- .row-->
</div><!-- .container-->

<!--*******Section 2: call to action for sign up********** -->
<img src="/img/pizza_piecee.jpg" alt="hero image">
<h2>Register FREE account to Get Started</h2>
<a class="button" href="">School Sign up</a>
<a class="button" href="">Parents Sign up</a>

<!--*******Section 3: Pizza Nutrition********** -->
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<img src="" alt="pizza piece">
		</div><!-- .col-->

		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<h3>Pizza Nutrition</h3>
			<div>Every pizza ordered has the potential to be a totally unique creation, and this nutritional guide reflects that range of possibilities. Nutritional information is provided for each of the elements that go into a pizza: what size pizza, what type of crust, sauce, toppings.</div>
		</div><!-- .col-->
	</div><!-- .row-->
</div><!-- .container-->

<!--*******Section 4: call to action for instruction page********** -->
<img src="/img/pizza_making.jpg" alt="hero image">
<h2>It's simple to get started</h2>
<a class="button" href="">School Instruction</a>
<a class="button" href="">Parents Instruction</a>

@include('partials.newsletter')

@endsection