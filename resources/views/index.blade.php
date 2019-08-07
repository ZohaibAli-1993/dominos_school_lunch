@extends('layouts.app')

@section('content')
@include('partials.flash')
<!--*******Section 1: shipping, call number and Gift Cards********** -->
<div class="container" id="section1">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<i class="fas fa-shipping-fast shipping home_icon"></i>
			<h3>Shipping</h3>
			<div>Available for all order</div>
		</div><!-- .col-->

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<i class="fas fa-mobile-alt call home_icon"></i>
			<h3>Call Us At</h3>
			<div>1-866-903-1151</div>
		</div><!-- .col-->

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<i class="fas fa-gift gift_card home_icon"></i>
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
<div id="section2">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Register FREE account to Get Started</h2>
				<a class="button school" href="">School Sign up</a>
				<a class="button parents" href="">Parents Sign up</a>
			</div><!-- .col-->
		</div><!-- .row-->
	</div><!-- .container-->
</div>


<!--*******Section 3: Pizza Nutrition********** -->
<div id="section3">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 piece">
				<img src="/img/pizza_piece.jpg" alt="pizza piece">
			</div><!-- .col-->

			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 content">
				<h3>Pizza Nutrition</h3>
				<div>Every pizza ordered has the potential to be a totally unique creation, and this nutritional guide reflects that range of possibilities. Nutritional information is provided for each of the elements that go into a pizza: what size pizza, what type of crust, sauce, toppings.</div>
			</div><!-- .col-->
		</div><!-- .row-->
	</div><!-- .container-->
</div>


<!--*******Section 4: call to action for instruction page********** -->

<img src="/img/pizza_making.jpg" alt="hero image">
<h2>It's simple to get started</h2>
<a class="button" href="">School Instruction</a>
<a class="button" href="">Parents Instruction</a>

<div id="section4">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>It's simple to get started</h2>
				<a class="button school" href="">School Instruction</a>
				<a class="button parents" href="">Parents Instruction</a>
			</div><!-- .col-->
		</div><!-- .row-->
	</div><!-- .container-->
</div>


@include('partials.subscribe')

@endsection