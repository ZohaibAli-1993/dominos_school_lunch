@extends('layouts.app')

@section('content')
@include('partials.flash')
<div class="text content">
<h3>Add student</h3>

<div class="row">
 
    <div class="col-8">
    	
    	<form class="add_student" method="post" action="/parents/{{$parentRegister->idparent}}/student/add"> 
    		@csrf
    		<input type="hidden" value="{{$parentRegister->idparent}} " name="idparent"></input>

		  	<div class="form-group">
		    	<label for="add_student_first_name">First Name</label>
		    	<input type="text" class="form-control" id="add_student_first_name" placeholder="First name" name="first_name" value="{{old('first_name')}}">
		    	@if($errors->has('first_name'))
            		<span class="text-danger error">{{ $errors->first('first_name') }}</span>
        		@endif
		  	</div>
		  	<div class="form-group">
		    	<label for="add_student_last_name">Last Name</label>
		    	<input type="text" class="form-control" id="add_student_last_name" placeholder="Last name" name="last_name" value="{{old('last_name')}}">
		    	@if($errors->has('last_name'))
            		<span class="text-danger error">{{ $errors->first('last_name') }}</span>
        		@endif
		  	</div>
		  	<div class="form-group">

		    <label for="add_student_classroom">Classroom</label>
		    <select class="form-control" id="add_student_classroom" name="idclassroom">
		    	
		     	<option>Room_1</option>
		      	<option>Room_2</option>
		      	<option>Room_3</option>
		      	<option>Room_4</option>
		    </select>
		    
		  	</div>
		  	<button id="add_student_btn" type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>

</div>

@endsection