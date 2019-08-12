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
			$("#ModalprovinceForm").modal('show');
		});
	</script>
@else
	<script>
	    // If there aren't errors, hide modal form when the page load

	    $(document).ready(function(){
	        $("#ModalprovinceForm").hide();
	    });

	    /*
	    * When modal is shown, fill fields value in the form
		*/
		$(function() {
		    $("#ModalprovinceForm").on("shown.bs.modal", function (e) { 
		    	$("#province").val($(e.relatedTarget).data('province'));
			    $("#province_name").val($(e.relatedTarget).data('province_name'));
			    $("#gst_rate").val($(e.relatedTarget).data('gst_rate'));
			    $("#pst_rate").val($(e.relatedTarget).data('pst_rate'));
			    $("#hst_rate").val($(e.relatedTarget).data('hst_rate'));
			    $("#qst_rate").val($(e.relatedTarget).data('qst_rate'));
		    });
	    });	 

	</script>
@endif

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left">Provinces</h1>

				@include('partials.flash')
	
				<div class="card mt-5">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				          	<th scope="col" class="text-center">Province</th>
				            <th scope="col" class="text-center">GST Rate</th>
				            <th scope="col" class="text-center">PST Rate</th>
				            <th scope="col" class="text-center">HST Rate</th>
				            <th scope="col" class="text-center">QST Rate</th>
				            <th scope="col" class="text-center"></th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($provinces as $province)
				            <tr scope="row">
	
			    	            <td>
									{{ $province->province  . ' - ' .
								       $province->province_name }} 
		    	                </td>

					            <td>
					                {{ $province->gst_rate }}
		    	                </td>
		    	                <td>
									{{ $province->pst_rate }} 
		    	                </td>
		    	                <td>
									{{ $province->hst_rate }}
		    	                </td>
		    	                <td>
		    	                	{{ $province->qst_rate}}
		    	                </td>    	                	

		    	                <td>
		    	                	<a
		    	                	class="button red"
		    	                	data-toggle="modal" 
		    	                	data-target="#ModalprovinceForm" 
		    	                	data-title="Edit Menu Item"
		    	                	data-province="{{ $province->province }}"
		    	                	data-province_name="{{ $province->province . ' - ' .
		    	                	    $province->province_name }}"
				                    data-gst_rate="{{ $province->gst_rate }}"
				                    data-pst_rate="{{ $province->pst_rate }}"
				                    data-hst_rate="{{ $province->hst_rate }}"
				                    data-qst_rate="{{ $province->qst_rate }}"
		    	                	id="edit">Edit</a>
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
<div id="ModalprovinceForm" class="modal fade"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="title" class="modal-title">Province Details</h1>
                <button type="button" class="close" 
                        data-dismiss="modal">&times;</button>
            </div>

            @include('partials.errors')

            <div class="modal-body">
			    <form id="form" action="/dominos/provinces" 
			          method="post" autocomplete="off">

			    	@csrf <!-- to create csrf token in the form -->

			    	@method('PUT')
		
			    	<input id="province" name="province" type="hidden" 
			    	value="{{ old('province') }}">

			        <div class ="form-group">
						<label for="province_name">Province</label>
						<input id="province_name" 
						       name="province_name"
						       type="text" 
						       class="form-control" 
						       readonly
						       value="{{ old('province_name') }}">
						@if($errors->has('province_name'))
					    <span class="error text-danger">{{ $errors->first('province_name') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="gst_rate">GST Rate</label>
						<input id="gst_rate" 
						       name="gst_rate"
						       type="text" 
						       class="form-control" 
						       value="{{ old('gst_rate') }}">
						@if($errors->has('gst_rate'))
					    <span class="error text-danger">{{ $errors->first('gst_rate') }}</span>
					    @endif					
					</div>


			        <div class ="form-group">
						<label for="pst_rate">PST Rate</label>
						<input id="pst_rate" 
						       name="pst_rate"
						       type="text" 
						       class="form-control" 
						       value="{{ old('pst_rate') }}">
						@if($errors->has('pst_rate'))
					    <span class="error text-danger">{{ $errors->first('pst_rate') }}</span>
					    @endif					
					</div>		

			        <div class ="form-group">
						<label for="hst_rate">HST Rate</label>
						<input id="hst_rate" 
						       name="hst_rate"
						       type="text" 
						       class="form-control" 
						       value="{{ old('hst_rate') }}">
						@if($errors->has('hst_rate'))
					    <span class="error text-danger">{{ $errors->first('hst_rate') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="qst_rate">QST Rate</label>
						<input id="qst_rate" 
						       name="qst_rate"
						       type="text" 
						       class="form-control" 
						       value="{{ old('qst_rate') }}">
						@if($errors->has('qst_rate'))
					    <span class="error text-danger">
					    	{{ $errors->first('qst_rate') }}</span>
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
						        href="/dominos/provinces">Cancel</a>


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