@extends('layouts.app')

@section('content')


<div class="container" style="min-height: 75vh;">

	<h1 class="h1 mt-3 pt-5">Reports</h1>
	    <div class="row mb-3">
	        <div class="col-lg-6 text-center mb-3"> 
		        <img src="/img/reports_orders.png" 
		        	  alt="Orders" 
		        	  class="rounded mx-auto d-block mb-3"
		        	  style="width: 300px;height:280px">	    	
				<a name="btn-orders" 
		        id="btn-orders"
		        class="button"
		        href="/schools/reports/orders">Orders</a>
		    </div>	    	
	        <div class="col-lg-6 text-center mb-3"> 
	        	<img src="/img/reports_classrooms.jpg" 
	        	     class="rounded mx-auto d-block mb-5"
	        	     style="width: 300px;height:250px;">
				<a name="btn-classrooms" 
		        id="btn-cancel"
		        class="button"
		        href="/schools/reports/classrooms">Classrooms</a>
	        </div>
	    </div>
	    <div class="row mb-3">
	        <div class="col-lg-6 text-center mb-3">
	        	<img src="/img/reports_students.jpg" 
	        	     alt="Students" 
	        	     class="rounded mx-auto d-block mb-5"
	        	     style="width: 300px;height:250px;">	        	
				<a name="btn-students" 
		        id="btn-students"
		        class="button"
		        href="/schools/reports/students">Students</a>
	        </div>   
	        <div class="col-lg-6 text-center mb-3"> 
	        	<img src="/img/reports_parents.jpg" 
	        	     alt="Parents" 
	        	     class="rounded mx-auto d-block mb-5"
	        	     style="width: 300px;height:250px;">	        	
				<a name="btn-parents" 
		        id="btn-parents"
		        class="button"
		        href="/schools/reports/parents">Parents</a>
	        </div> 
	    </div> 
    </div>
</div>

@endsection