@extends('layouts.app')

@section('links_events')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('content')

    <div class="d-flex" id="wrapper">

		<div class="container mb-3 mt-5 ml-0 mx-auto">

			<div class="col">

		        <h1 class="h1 text-center"> {{ $school->school_name }} </h1>
			    <h2 class="h2">Reports - Events/Orders</h2>

				@include('partials.flash')

				<p>
					<a  class="button" 
					    href="/schools/reports/download/orders"  
					    target="_blank"            
					    >
					    Download
					</a>
					<a  class="button ml-3" 
					    href="/schools/reports"          
					    >
					    Reports
					</a>					
				</p>
				<div class="card mt-2">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				            <th scope="col" class="text-center">Event Date</th>
				            <th scope="col" class="text-center">Event Name</th>
				            <th scope="col" class="text-center">Cutoff Date</th>
				          	<th scope="col" class="text-center">Event Time</th>
				          	<th scope="col" class="text-center">Classroom</th>
				            <th scope="col" class="text-center">Description</th>
				            <th scope="col" class="text-center">First Name</th>
				            <th scope="col" class="text-center">Last Name</th>
				            <th scope="col" class="text-center">Order</th>           
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($event_orders_list as $event_order)
				            <tr scope="row">
		    	                <td>
									{{ $event_order->event_date }} 
		    	                </td>
		    	                <td>
									{{ $event_order->event_name }}
		    	                </td>    	                
		    	                <td>
		    	                	{{ $event_order->cutoff_date }}
		    	                </td>
		    	                <td>
		    	                	{{ $event_order->event_time }}
		    	                </td>					            	
					            <td>
					                {{ $event_order->classroom }}
		    	                </td>
		    	                <td>
									{{ $event_order->description }} 
		    	                </td>
		    	                <td>
									{{ $event_order->first_name }}
		    	                </td>
		    	                <td>
		    	                	{{ $event_order->last_name }}
		    	                </td>	    	                	
					            <td>
					                {{ $event_order->idorder }}
		    	                </td>
				            </tr>
				            @endforeach
				         </tbody>
				      </table>
				    </div>
				  </div>
				</div>		
				
			</div>

		</div>
    </div>
    <!-- /#page-content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

@endsection