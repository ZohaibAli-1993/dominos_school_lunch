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
			$("#ModalstoreForm").modal('show');
		});
	</script>
@else
	<script>
	    // If there aren't errors, hide modal form when the page load

	    $(document).ready(function(){
	        $("#ModalstoreForm").hide();
	    });

	    /*
	    * When modal is shown, fill fields value in the form
		*/
		$(function() {
		    $("#ModalstoreForm").on("shown.bs.modal", function (e) { 
			    $("#idstore").val($(e.relatedTarget).data('idstore'));
			    $("#name").val($(e.relatedTarget).data('name'));
			    $("#address").val($(e.relatedTarget).data('address'));
			    $("#city").val($(e.relatedTarget).data('city'));
			    $("#province").val($(e.relatedTarget).data('province'));
			    $("#postal_code").val($(e.relatedTarget).data('postal_code'));
			    $("#phone").val($(e.relatedTarget).data('phone'));
			    $("#email_").val($(e.relatedTarget).data('email'));
		    });
	    });	 

	</script>
@endif

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left">Stores</h1>

				@include('partials.flash')
	
				<div class="card mt-5">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				          	<th scope="col" class="text-center">Name</th>
				            <th scope="col" class="text-center">Address</th>
				            <th scope="col" class="text-center">City</th>
				            <th scope="col" class="text-center">Province</th>
				            <th scope="col" class="text-center">Postal Code</th>
				            <th scope="col" class="text-center">Phone</th>
				            <th scope="col" class="text-center">Email</th>
				            <th scope="col" class="text-center"></th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($stores as $store)
				            <tr scope="row">
	
					            <td>
					                {{ $store->name }}
		    	                </td>
		    	                <td>
									{{ $store->address }} 
		    	                </td>
		    	                <td>
									{{ $store->city }}
		    	                </td>
		    	                <td>
		    	                	{{ $store->province}}
		    	                </td>
		    	                <td>
									{{ $store->postal_code }} 
		    	                </td>
		    	                <td>
									{{ $store->phone }}
		    	                </td>
		    	                <td>
		    	                	{{ $store->email }}
		    	                </td>			    	                	

		    	                <td>
		    	                	<a
		    	                	class="button edit"
		    	                	data-toggle="modal" 
		    	                	data-target="#ModalstoreForm" 
		    	                	data-title="Edit store"
		    	                	data-idstore="{{ $store->idstore }}"
				                    data-name="{{ $store->name }}"
				                    data-address="{{ $store->address }}"
				                    data-city="{{ $store->city }}"
				                    data-province="{{ $store->province }}"
				                    data-postal_code="{{ $store->postal_code }}"
				                    data-phone="{{ $store->phone }}"
				                    data-email="{{ $store->email }}"				                    
		    	                	id="btn_edit">
		    	                		<i class="far fa-edit"></i>
		    	                	</a>
		    	                </td>

				            </tr>
				            @endforeach
				         </tbody>
				      </table>
				    </div>
				  </div>
				</div>		

				<button type="button" class="button" 
				    data-toggle="modal" 
				    data-target="#ModalstoreForm"
				    data-title="Add store"
				    data-idstore="new"
                    data-name=""
                    data-address=""
                    data-city=""
                    data-province=""
                    data-postal_code=""
                    data-phone=""
                    data-email=""                    
				    >
				    Add New Store
				</button>
			</div>

		</div>
    </div>
    <!-- /#page-content-wrapper -->


<!-- Modal HTML Markup -->
<div id="ModalstoreForm" class="modal fade"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="title" class="modal-title">Store Details</h1>
                <button type="button" class="close" 
                        data-dismiss="modal">&times;</button>
            </div>

            @include('partials.errors')

            <div class="modal-body">
			    <form id="form" action="/dominos/stores" 
			          method="post" autocomplete="off">

			    	@csrf <!-- to create csrf token in the form -->

			    	@method('PUT')
		
			    	<input id="idstore" name="idstore" type="hidden" 
			    	value="{{ old('idstore') }}">

			        <div class ="form-group">
						<label for="name">Name</label>
						<input id="name" 
						       name="name"
						       type="text" 
						       class="form-control" 
						       value="{{ old('name') }}">
						@if($errors->has('name'))
					    <span class="error text-danger">{{ $errors->first('name') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="address">Address</label>
						<input id="address" 
						       name="address"
						       type="text" 
						       class="form-control" 
						       value="{{ old('address') }}">
						@if($errors->has('address'))
					    <span class="error text-danger">{{ $errors->first('address') }}</span>
					    @endif					
					</div>		

			        <div class ="form-group">
						<label for="city">City</label>
						<input id="city" 
						       name="city"
						       type="text" 
						       class="form-control" 
						       value="{{ old('city') }}">
						@if($errors->has('city'))
					    <span class="error text-danger">{{ $errors->first('city') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="province">Province</label>
						<input id="province" 
						       name="province"
						       type="text" 
						       class="form-control" 
						       value="{{ old('province') }}">
						@if($errors->has('province'))
					    <span class="error text-danger">
					    	{{ $errors->first('province') }}</span>
					    @endif	
                    </div>	

			        <div class ="form-group">
						<label for="postal_code">Postal Code</label>
						<input id="postal_code" 
						       name="postal_code"
						       type="text" 
						       class="form-control" 
						       value="{{ old('postal_code') }}">
						@if($errors->has('postal_code'))
					    <span class="error text-danger">
					    	{{ $errors->first('postal_code') }}</span>
					    @endif	
                    </div>	

			        <div class ="form-group">
						<label for="phone">Phone</label>
						<input id="phone" 
						       name="phone"
						       type="text" 
						       class="form-control" 
						       value="{{ old('phone') }}">
						@if($errors->has('phone'))
					    <span class="error text-danger">
					    	{{ $errors->first('phone') }}</span>
					    @endif	
                    </div>	

			        <div class ="form-group">
						<label for="email_">Email</label>
						<input id="email_" 
						       name="email"
						       type="text" 
						       class="form-control" 
						       value="{{ old('email') }}">
						@if($errors->has('email'))
					    <span class="error text-danger">
					    	{{ $errors->first('email') }}</span>
					    @endif	
                    </div>	                                                         

					<div class="row mt-5">
						<button name="submit" 
						        type="submit" 
						        id="form-submit"
						        class="button mr-3 ml-3">Save</button>

						<a name="btn-cancel" 
						        id="btn-cancel"
						        class="button"
						        href="/dominos/stores">Cancel</a>


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