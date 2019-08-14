@extends('layouts.app')

@section('links_events')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('content')

    <div class="d-flex" id="wrapper">

		<div class="container mb-3 mt-3 ml-0 mx-auto">

			<div class="col">

		        <h1 class="h1 text-center"> {{ $school->school_name }} </h1>
			    <h2 class="h2">Reports - Parents</h2>

				@include('partials.flash')
	
				<p>
					<a  class="button" 
					    href="/schools/reports/download/parents"  
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
				          	<th scope="col" class="text-center">Parent First Name</th>
				          	<th scope="col" class="text-center">Parent Last Name</th>
				            <th scope="col" class="text-center">Email</th>
				          	<th scope="col" class="text-center">Classroom</th>
				            <th scope="col" class="text-center">Description</th>
				            <th scope="col" class="text-center">First Name</th>
				            <th scope="col" class="text-center">Last Name</th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($parents_list as $parent)
				            <tr scope="row">
		    	                <td>
									{{ $parent->parent_first_name }}
		    	                </td>
		    	                <td>
		    	                	{{ $parent->parent_last_name }}
		    	                </td>	
		    	                <td>
		    	                	{{ $parent->email }}
		    	                </td>			            	
					            <td>
					                {{ $parent->classroom }}
		    	                </td>
		    	                <td>
									{{ $parent->description }} 
		    	                </td>
		    	                <td>
									{{ $parent->first_name }}
		    	                </td>
		    	                <td>
		    	                	{{ $parent->last_name }}
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
<script src="https:/3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWl/cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTsgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

@endsection