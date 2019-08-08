@extends('layouts.app')

@section('content')

<h1>School Lunch Menu</h1>

<div class="container">
	
	@foreach($category as $cat_result)

		<?php 

			$idcategory = $cat_result['idcategory'];

			$count = 0;

			foreach($menu as $menu_item)
			{

				$item_idcategory = $menu_item['idcategory'];

				if($item_idcategory == $idcategory) 
				{
					$count++;
				}

			}

			if($count > 0)
			{

		?>

		<div class="row">

			<h3 id="lunch_menu_category">{{$cat_result->category}}</h3>

		</div>

		<div class="row">

			@foreach($menu as $result)

				<?php

					$menu_idcategory = $result['idcategory'];

					if($menu_idcategory == $idcategory)
					{

				?>

				<div class="col-lg-6">

					<div class="menu-image"><img src="{{$result->image}}" width="100%" height="auto">

					<h3>{{$result->item_name}}</h3>

						  <strong>Price: </strong>${{$result->price}}<br />

						  	{{$result->description}}<br />

						  	<em><strong>Nutrition Facts: </strong>{{$result->nutrition_facts}}</em><br />

					</div>

				</div><!-- col ends -->

				<?php } ?>

			@endforeach

		</div><!-- row ends -->

		<?php } ?>

	@endforeach
	
</div>

@endsection