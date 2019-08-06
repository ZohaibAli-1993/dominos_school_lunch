@extends('layouts.app')

@section('content')

<h1>Menu</h1>

<div class="container">
	<div class="row">

		@foreach($menu as $result)
			<div class="col-lg-4">
				<div class="menu-image"><img src="{{$result['image']}}" width="100%" height="200">
				<h3>{{$result['item_name']}}</h3>
					  <strong>{{$result['price']}}</strong><br />
					  	{{$result['description']}}<br />
					  	<em>Nutrition Facts: {{$result['nutrition_facts']}}</em><br />
				</div>

			</div><!-- col ends -->
		@endforeach

	</div><!-- row ends -->
</div>

<h2>12'' pizza cut into 1/4</h2>



<div class="row">

	<div class="col">
		<div class="menu-image"><img src="img/pizza_mix.jpg" width="100%" height="200">
		<h3>Cheese Pizza</h3>
			  <strong>$ 2.25/piece</strong><br />
			  	Products Details<br />
			  	Big Slice Cheese Pizza<br />
			    <a href="#" type="button" id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->

	<div class="col">
		<div class="menu-image"><img src="img/pizza_hawaii.jpg" width="100%" height="200">
		<h3>Ham & Pinnaple Pizza</h3>
		<strong>$ 2.75/piece</strong><br />
		Product Details:<br />
		Ham & Pinnaple Pizza<br />
		<a type="button" id="menu-add-btn">Add</a></div>


	</div><!-- col ends -->

	<div class="col">
		<div class="menu-image"><img src="img/pizza_peperoni.jpg" width="100%" height="200">
		<h3>Pepperoni Pizza</h3>
		<strong>$ 2.25/piece</strong><br />
		Product Details:<br />
		Big Slice Pepperoni Pizza<br />
		<a type="button" id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->

	
</div><!-- row ends -->


<h2>14'' pizza cut into 1/8</h2>
    
<div class="row">
	<div class="col">
		<div class="menu-image"><img src="img/pizza_mix.jpg" width="100%" height="200">
		<h3>Cheese Pizza</h3>
			  <strong>$ 1.10/piece</strong><br />
			  	Products Details<br />
			  	Big Slice Cheese Pizza<br />
			    <a type="button" id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->

	<div class="col" class="menu-image">
		<div class="menu-image"><img src="img/pizza_hawaii.jpg" width="100%" height="200">
		<h3>Ham & Pinnaple Pizza</h3>
		<strong>$ 1.20/piece</strong><br />
		Product Details:<br />
		Ham & Pinnaple Pizza<br />
		<a type="button"  id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->

	<div class="col" class="menu-image">
		<div class="menu-image"><img src="img/pizza_peperoni.jpg" width="100%" height="200">
		<h3>Pepperoni Pizza</h3>
		<strong>$ 1.10/piece</strong><br />
		Product Details:<br />
		Big Slice Pepperoni Pizza<br />
		<a type="button"  id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->


</div><!-- row ends -->

<h2>10'' pizza cut into 1/4 Gluten Free</h2>
    
<div class="row">
	<div class="col">
		<div class="menu-image"><img src="img/pizza_mix.jpg" width="100%" height="200">
		<h3>Cheese Pizza</h3>
			  <strong>$ 1.10/piece</strong><br />
			  	Products Details<br />
			  	Big Slice Cheese Pizza<br />
			    <a type="button"  id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->

	<div class="col">
		<div class="menu-image"><img src="img/pizza_hawaii.jpg" width="100%" height="200">
		<h3>Ham & Pinnaple Pizza</h3>
		<strong>$ 1.20/piece</strong><br />
		Product Details:<br />
		Ham & Pinnaple Pizza<br />
		<a type="button"  id="menu-add-btn">Add</a></div>

	</div><!-- col ends -->

	<div class="col">
		<div class="menu-image"><img src="img/pizza_peperoni.jpg" width="100%" height="200">
		<h3>Pepperoni Pizza</h3>
		<strong>$ 1.10/piece</strong><br />
		Product Details:<br />
		Big Slice Pepperoni Pizza<br />
		<a type="button"  id="menu-add-btn">Add</a></p></div>

	</div><!-- col ends -->


</div><!-- row ends -->


@endsection