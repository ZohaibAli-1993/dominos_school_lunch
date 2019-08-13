@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/admin_sidebar.css" />

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

@endsection

@section('content')

<script>
    /*
	 * Defines begin and end date as datepicker
	 */
    $( function() {
		$( "#end_dt" ).datepicker({
			dateFormat: 'yy-mm-dd'
		});
    } );

    $( function() {
		$( "#begin_dt" ).datepicker({
			dateFormat: 'yy-mm-dd'
		});
    } );   
</script>

	@if(Session::has('errors'))
	<script>

		// If there are errors, open modal form when the page load
		$(document).ready(function(){
			$("#ModalCalendarForm").modal('show');
		});
	</script>
	@else
	<script>
	    // If there aren't errors, hide modal form when the page load

	    $(document).ready(function(){
	        $("#ModalCalendarForm").hide();
	    });

	    /*
	    * When modal is shown, fill fields value in the form
		*/
		$(function() {
		    $("#ModalCalendarForm").on("shown.bs.modal", function (e) { 
			    $("#idcalendar").val($(e.relatedTarget).data('idcalendar'));
			    $("#school_year").val($(e.relatedTarget).data('school_year'));
			    $("#begin_dt").val($(e.relatedTarget).data('begin_dt'));
			    $("#end_dt").val($(e.relatedTarget).data('end_dt'));
			    $("#is_active").val($(e.relatedTarget).data('is_active'));
		    });
	    });	 

	</script>
	@endif

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left">Calendars</h1>

				@include('partials.flash')
	
				<div class="card mt-5">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				          	<th scope="col" class="text-center">School Year</th>
				            <th scope="col" class="text-center">Begin Date</th>
				            <th scope="col" class="text-center">End Date</th>
				            <th scope="col" class="text-center">Active</th>
				            <th scope="col" class="text-center"></th>

				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($calendars as $calendar)
				            <tr scope="row">
	
					            <td>
					                {{ $calendar->school_year }}
		    	                </td>
		    	                <td>
									{{ $calendar->begin_dt }} 
		    	                </td>
		    	                <td>
									{{ $calendar->end_dt }}
		    	                </td>
		    	                <td>
		    	                	<?php 
		    	                	if($calendar->is_active==0){
				                            echo 'No';
				                    } else 
				                    { echo 'Yes';}                     
									?>
		    	                </td>	

		    	                <td>
		    	                	<a
		    	                	class="button red"
		    	                	data-toggle="modal" 
		    	                	data-target="#ModalCalendarForm" 
		    	                	data-title="Edit Calendar"
		    	                	data-idcalendar="{{ $calendar->idcalendar }}"
				                    data-school_year="{{ $calendar->school_year }}"
				                    data-begin_dt="{{ $calendar->begin_dt }}"
				                    data-end_dt="{{ $calendar->end_dt }}"
				                    data-is_active="{{ $calendar->is_active }}"
		    	                	id="edit">Edit</a>
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
				    data-target="#ModalCalendarForm"
				    data-title="Add Calendar"
				    data-idcalendar="new"
                    data-school_year=""
                    data-begin_dt=""
                    data-end_dt=""
                    data-is_active=""
				    >
				    Add New Calendar
				</button>
			</div>

		</div>
    </div>
    <!-- /#page-content-wrapper -->
</div>

<!-- Modal HTML Markup -->
<div id="ModalCalendarForm" class="modal fade"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="title" class="modal-title">Calendar Details</h1>
                <button type="button" class="close" 
                        data-dismiss="modal">&times;</button>
            </div>

            @include('partials.errors')

            <div class="modal-body">
			    <form id="form" action="/dominos/calendars" 
			          method="post" autocomplete="off">

			    	@csrf <!-- to create csrf token in the form -->

			    	@method('PUT')
		
			    	<input id="idcalendar" name="idcalendar" type="hidden" 
			    	value="{{ old('idcalendar') }}">

			        <div class ="form-group">
						<label for="school_year">School Year</label>
						<input id="school_year" 
						       name="school_year"
						       type="text" 
						       class="form-control" 
						       value="{{ old('school_year') }}">
						@if($errors->has('school_year'))
					    <span class="error text-danger">{{ $errors->first('school_year') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="begin_dt">Begin Date</label>
						<input id="begin_dt" 
						       name="begin_dt"
						       type="text" 
						       class="form-control" 
						       value="{{ old('begin_dt') }}">
						@if($errors->has('begin_dt'))
					    <span class="error text-danger">{{ $errors->first('begin_dt') }}</span>
					    @endif					
					</div>		

			        <div class ="form-group">
						<label for="end_dt">End Date</label>
						<input id="end_dt" 
						       name="end_dt"
						       type="text" 
						       class="form-control" 
						       value="{{ old('end_dt') }}">
						@if($errors->has('end_dt'))
					    <span class="error text-danger">{{ $errors->first('end_dt') }}</span>
					    @endif					
					</div>
					<?php 
					    if(old('is_active', 
                                   $calendar->is_active)==0){
                            $selec0 =  'selected';
                        } else 
                        { $selec0 =  '';}
					    if(old('is_active', 
                                   $calendar->is_active)==1){
                            $selec1 =  'selected';
                        } else 
                        { $selec1 =  '';}                        
					?>

			        <div class ="form-group">
						<label for="is_active">Active</label>
					    <select name="is_active" 
					            id="is_active"
					            class="form-control" >
                        <option value="1"
                                {{ $selec1 }}
                                >Yes</option>
                        <option value="0" 
                                {{ $selec0 }}
                                >No</option>

                    	</select>	
                    </div>	

					<div class="row mt-5">
						<button name="submit" 
						        type="submit" 
						        id="form-submit"
						        class="button mr-3 ml-3">Save</button>

						<a name="btn-cancel" 
						        id="btn-cancel"
						        class="button"
						        href="/dominos/calendars">Cancel</a>


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