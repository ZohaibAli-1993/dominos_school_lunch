@extends('layouts.app')

@section('content')


<div class="container" style="min-height: 75vh;">

	<h1 class="h1 mt-3 pt-5">Reports</h1>
	    <div class="row">
	        <div class="col-md-3 text-center"> 
	        	<img src="/img/reports_classrooms.jpg" 
	        	     alt="Classrooms" 
	        	     class="img-thumbnail mb-3">
				<a name="btn-classrooms" 
		        id="btn-cancel"
		        class="button"
		        href="/dominos/classrooms">Classrooms</a>
	        </div>
	        <div class="col-md-3 text-center"> 
				<a name="btn-orders" 
		        id="btn-orders"
		        class="button"
		        href="/dominos/orders">Orders</a>
	        </div>   
	        <div class="col-md-3"> 
				<a name="btn-students" 
		        id="btn-students"
		        class="button"
		        href="/dominos/students">Students</a>
	        </div>   
	        <div class="col-md-3"> 
				<a name="btn-parents" 
		        id="btn-parents"
		        class="button"
		        href="/dominos/parents">Parents</a>
	        </div>  
    </div>
</div>

@endsection