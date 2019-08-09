@extends('layouts.app')

@section('content')
@include('partials.flash')
<div class="text content">
<h3>Edit {{$student['first_name']}} {{$student['last_name']}}'s Profile</h3>

<div class="row">
 
    <div class="col-8">
    	
    	<form class="edit_student" method="post" action=""> 
    		@csrf
    		@method('PUT')
    		<input type="hidden" value="{{$parentRegister->idparent}} " name="idparent"></input>
    		<input type="hidden" value="{{$student->idschool}} " name="idparent"></input>

		  	<div class="form-group">
		    	<label for="add_student_first_name">First Name</label>
		    	<input type="text" class="form-control" id="add_student_first_name" name="first_name" value="{{old('first_name',$student->first_name)}}">
		    	@if($errors->has('first_name'))
            		<span class="text-danger error">{{ $errors->first('first_name') }}</span>
        		@endif
		  	</div>
		  	<div class="form-group">
		    	<label for="add_student_last_name">Last Name</label>
		    	<input type="text" class="form-control" id="add_student_last_name" name="last_name" value="{{old('last_name',$student->last_name)}}">
		    	@if($errors->has('last_name'))
            		<span class="text-danger error">{{ $errors->first('last_name') }}</span>
        		@endif
		  	</div>
		  	<div class="form-group">

		    <label for="add_student_classroom">Classroom</label>
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