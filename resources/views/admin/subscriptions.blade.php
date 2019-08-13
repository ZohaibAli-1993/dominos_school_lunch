@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/admin_sidebar.css" />

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

@endsection

@section('content')

@if(Session::has('errors'))
	<script>

		// If there are errors, open modal form when the page load
		$(document).ready(function(){
			$("#ModalsubscriptionForm").modal('show');
		});
	</script>
@else
	<script>
	    // If there aren't errors, hide modal form when the page load

	    $(document).ready(function(){
	        $("#ModalsubscriptionForm").hide();
	    });

	    /*
	    * When modal is shown, fill fields value in the form
		*/
		$(function() {
		    $("#ModalsubscriptionForm").on("shown.bs.modal", function (e) { 
			    $("#idsubscription").val($(e.relatedTarget).data('idsubscription'));
			    $("#email_").val($(e.relatedTarget).data('email'));
			    $("#created_at").val($(e.relatedTarget).data('created_at'));
		    });
	    });	 
	</script>
@endif

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left">Subscriptions</h1>

				@include('partials.flash')
	
				<div class="card mt-5">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				            <th scope="col" class="text-center">Email</th>
				            <th scope="col" class="text-center">Created At</th>
				         </tr>
				        </thead>
				        <tbody>
				        	@foreach ($subscriptions as $subscription)
				            <tr scope="row">
		    	                <td>
									{{ $subscription->email }} 
		    	                </td> 	                	
		    	                <td>
		    	                	{{ $subscription->created_at}}
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


<!-- Modal HTML Markup -->
<div id="ModalsubscriptionForm" class="modal fade"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="title" class="modal-title">subscription Details</h1>
                <button type="button" class="close" 
                        data-dismiss="modal">&times;</button>
            </div>

            @include('partials.errors')

            <div class="modal-body">
			    <form id="form" action="/dominos/subscriptions" 
			          method="post" autocomplete="off">

			    	@csrf <!-- to create csrf token in the form -->
		
			    	<input id="idsubscription" name="idsubscription" type="hidden" 
			    	value="{{ old('idsubscription') }}">

			        <div class ="form-group">
						<label for="email_">Email</label>
						<input id="email_" 
						       name="email"
						       type="text" 
						       class="form-control" 
						       value="{{ old('email') }}">
						@if($errors->has('email'))
					    <span class="error text-danger">{{ $errors->first('email') }}</span>
					    @endif					
					</div>		

			        <div class ="form-group">
						<label for="created_at">Created At</label>
						<input id="created_at" 
						       name="created_at"
						       type="text" 
						       class="form-control" 
						       value="{{ old('created_at') }}">
						@if($errors->has('created_at'))
					    <span class="error text-danger">{{ $errors->first('created_at') }}</span>
					    @endif					
					</div>

					<div class="row mt-5 ml-0">
						<a name="btn-cancel" 
						        id="btn-cancel"
						        class="button"
						        href="/dominos/subscriptions">Cancel</a>

					</div>
					
				</form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

@endsection