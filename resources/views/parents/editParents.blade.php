@extends('layouts.app')

@section('content')
@include('partials.flash')

<div class="container">
	<div class="row">
		<div class="col">
			<h3 class="h3">Edit {{$parentRegister['first_name']}} {{$parentRegister['last_name']}}'s Profile</h3>
		</div><!-- /col-->
	</div><!-- /row-->

	<div class="row">
		<div class="col">
			<form class="edit_parents" method="post" action=""> 
	    		@csrf
	    		@method('PUT')
	    		<input type="hidden" value="{{$parentRegister->idparent}}" name="idparent">

			  	<div class="form-group">
			    	<label for="first_name">First Name</label>
			    	<input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name',$parentRegister->first_name)}}">
			    	@if($errors->has('first_name'))
	            		<span class="text-danger error">{{ $errors->first('first_name') }}</span>
	        		@endif
			  	</div><!-- /form group-->

			  	<div class="form-group">
			    	<label for="last_name">Last Name</label>
			    	<input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name',$parentRegister->last_name)}}">
			    	@if($errors->has('last_name'))
	            		<span class="text-danger error">{{ $errors->first('last_name') }}</span>
	        		@endif
			  	</div><!-- /form group-->

			  	<div class="form-group">
			    	<label for="email">Email</label>
			    	<input type="text" class="form-control" id="parent_email" name="email" value="{{old('email',$parentRegister->email)}}">
			    	@if($errors->has('email'))
	            		<span class="text-danger error">{{ $errors->first('email') }}</span>
	        		@endif
			  	</div><!-- /form group-->
			  	
			  	<div class="form-group">
			    	<label for="phone">Phone</label>
			    	<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone',$parentRegister->phone)}}">
			    	@if($errors->has('phone'))
	            		<span class="text-danger error">{{ $errors->first('phone') }}</span>
	        		@endif
			  	</div><!-- /form group-->
			  	<button id="add_student_btn" type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div><!-- /col-->
	</div><!-- /row-->
</div><!-- /container-->

@endsection