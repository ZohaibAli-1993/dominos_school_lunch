@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row" id="hero-image">
			
				<img id="about-hero-image" src="/img/pizza.jpg" alt="Pizza" width="100%" />

		</div><!-- end row1 -->
	</div>
	

	<div class="container">
		<div class="row">
			<div class="col-6">
				<h1 class="h1 mt-3">About Us</h1>
                 <p>
					Every pizza ordered has the potential to be a totally unique creation. Nutritional information is provided for each of the elements that go into a pizza: what size pizza, what type of crust, sause, toppings. When you create your own pizza, to see the total picture of what you are ordering, add together the numbers for each elements from these charts.
				</p>

				<p>
					Lunch is an important meal of a day. Food is what gives you energy. Lunch raises your blood sugar level in the middle of the day, making you be able to focus for the rest of the afternoon. For kids, lunch is even more important becuase this is when they get their vitamins and nutrients for the day.
				</p>

				<p>
					Domino's Pizza helps them grow, to be energetic during all activities by supplying meals for schools lunches. This program is also beneficial for the parents. They do not need to feel out the papers for ordering food, they can rest couple days per week without packing lunches for their little ones. Finally, these lunches makes school's lives easier, they do not need to collect money from all the kids, to count amount of slices and convert them to pizzas.
				</p>

				<p>
					With Domino's delivery kids will get fresh pizza very quickly.
				</p>
                </div><!-- end col -->

                <div class="col-6">
                <br/>
				<br/>
				<br/>
				<img  src="img/Pizza_500.png" alt="Pizza Girl" width="100%" />

			</div><!-- end col -->

		</div><!-- end row2 -->

		
	</div><!-- end container -->

@include('partials.subscribe')

@endsection
