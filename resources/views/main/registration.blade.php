@extends('layouts.app')

@section('content')



<script>
	$(document).ready(function(){
		/**
		 * function of showing model box when page finnished load
		 * @return:
		 * 		- change opacity of overlay box to 0.5
		 * 		- slide the box from the left and change opacity of the box to 1 at the same time
		 */
		setTimeout(function(){
			$('#overlay').css('opacity', .9);
			$('#box_cover').animate({
				left: '30%',
				opacity: 1
			},500)

		},500)//end set time out
		/**
		 * function for close button
		 * @return: overlay background and box disappear
		 */
		$('#close_box').click(function(){
			$('#overlay').fadeTo(400,0);
			$('#box_cover').fadeTo(400,0);
		});//end close_box
    })//end document ready
</script>

<div id="overlay"></div>
<div id="box_cover">
	<div id="box">
		<div id="close_box">X</div>
		<div id="box_content">
			Please choose options below: <br/>
			<a class="button school" href="/school_registration">School Sign up</a>
			<a class="button parents" href="/parents_registration">Parents Sign up </a>
		</div>
	</div>
</div><!-- /box cover-->

<div id="register_main" class="container">
	<div class="row">
		<div class="col">
			<h1 class="h1">Registration Page</h1>
		</div><!-- /col-->
	</div><!-- /row-->
	
	<div class="row">
		<div class="col">
			<div id="register_body"></div>
		</div><!-- /col-->
	</div><!-- /row-->
	
	<div class="row">
		<div class="col">
			<a class="button school" href="">School Instruction</a>
			<a class="button parents" href="">Parents Instruction</a>
		</div><!-- /col-->
	</div><!-- /row-->
	
</div>

@endsection('content')