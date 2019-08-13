@extends('layouts.app')

@section('content')

@include('partials.flash')
<div class="text content">
<h3 class="h3">Add student</h3>

<div class="row">
 
    <div class="col-8">
    	
    	<form class="add_student" method="post" action=""> 
    		@csrf
    		<input type="hidden" value="{{$parentRegister->idparent}} " name="idparent"></input>

    		<div class="form-group">
		    	<label for="school_name">School Name</label>
		    	<input type="text" value="{{$school->school_name}} " name="school_name" class="form-control"readonly="readonly"></input>
		    	
		  	</div>

		  	<div class="form-group">
		    	<label for="add_student_first_name">Student First Name</label>
		    	<input type="text" class="form-control" id="add_student_first_name" placeholder="First name" name="first_name" value="{{old('first_name')}}">
		    	@if($errors->has('first_name'))
            		<span class="text-danger error">{{ $errors->first('first_name') }}</span>
        		@endif
		  	</div>
		  	<div class="form-group">
		    	<label for="add_student_last_name">Student Last Name</label>
		    	<input type="text" class="form-control" id="add_student_last_name" placeholder="Last name" name="last_name" value="{{old('last_name')}}">
		    	@if($errors->has('last_name'))
            		<span class="text-danger error">{{ $errors->first('last_name') }}</span>
        		@endif
		  	</div>
		  	<div class="form-group">

		  	<label for="idclassroom">Select a classroom</label>
		 	<select class="form-control" id="add_student_classroom" name="idclassroom">
			 	@foreach($classrooms as $key=>$classroom)
		     	<option value="{{$key}}" {{($key == old('idclassroom', $classroom->idclassroom)) ? 'selected' : ''}}>{{$classroom['classroom']}}</option>
		      	@endforeach
		    </select>
		    @if($errors->has('idclassroom'))
                <span class="text-danger error">{{ $errors->first('idclassroom') }}</span>
            @endif
		    
		  	</div>
		  	<button id="add_student_btn" type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
</div>

@endsection