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

@endsection