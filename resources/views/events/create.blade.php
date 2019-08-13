@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/calendarorganizer.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('content')

<script type="text/javascript">

    //Get begin and end date of active calendar
	begin = new Date("{{ $calendar->begin_dt }} 00:00:00");
	end = new Date("{{ $calendar->end_dt }} 00:00:00");

	/*
	 * Defines event date as datepicker, creating default values
	 * If a date it is selected, calculate a new cutoff date
	 */
    $( function() {
		$( "#event_date" ).datepicker({
			dateFormat: 'yy-mm-dd',
		    minDate: begin,
		    maxDate: end,
		    onSelect: function (dateText, inst) 
	        {          
	        	// When a new event date is selected, 
	        	// verify if it a weekend was selected
	        	var available_weekends = {!! $setup->available_weekends !!};
	        	var newCutoff = new Date($('#event_date').val() + " 00:00:00");
	        	var week_day = newCutoff.getDay();			

	        	/// Verify if the weekend is available
	        	if ((available_weekends == 0) && 
	        		((week_day==0) ||(week_day==6))){

	        		$('#event_date').val("");
	        		$('#cutoff_date').val("");
	        		
	        	    // Define message to show when weekend is not available
		        	var message = document.createElement("span");
		        	message.className = "error text-danger";
					message.id = "err_event_date";
					message.innerHTML = "Weekends are not available to schedule events.";
					var event_date_group = document.getElementById("event_date_group");
	        		event_date_group.appendChild(message);
	        		return;
	        	}
	        	else{
	        		if(document.getElementById('err_event_date') !== null){
	        		    document.getElementById("err_event_date").remove();
	        		}
	        	}
	        	

	        	// calculate new cutoff date
				var newCutoff = new Date($('#event_date').val() + " 00:00:00");
				var numberOfDaysCutoff = {!! $setup->cutoff_days !!};
				newCutoff.setDate(newCutoff.getDate() - numberOfDaysCutoff);
				var day = newCutoff.getDate();
				var month = newCutoff.getMonth() + 1;
				var year = newCutoff.getFullYear();
				if (day < 10) {
			        day = "0" + day;
			    }
			    if (month < 10) {
			        month = "0" + month;
			    }
			    var date = year + "-" + month + "-" + day;

				$('#cutoff_date').val(date);

         
	        }, 
		});
    } );

	/*
	 * Defines cutoff date as datepicker, creating default values
	 */
    $( function() {
		$( "#cutoff_date" ).datepicker({
			dateFormat: 'yy-mm-dd',
		    minDate: new Date(),
		    maxDate: end
		});
    } );   

</script>

<div class="container mb-5 pt-5">

	<div class="col">

		    <h1 class="h1 text-center"> {{ $school->school_name }} </h1>
			<h2 class="h2">Add New Event</h2>

			@include('partials.flash')
			@include('partials.errors')

		    <form id="form" 
		          action="/schools/events/create" 
		          method="post"
		          autocomplete="off">

		    	@csrf <!-- to create csrf token in the form -->

		    	<!--  ***Alessandra -------- change to school connected -------> 
		    	<input id="idschool" name="idschool" 
		    	       type="hidden" value="{{ $school->idschool }}">
		    	<input id="idstore" name="idstore" 
		    	       type="hidden" value="{{ $school->idstore }}">

		        <div class ="form-group">
					<label for="event_name">Event Name</label>
					<input id="event_name" 
					       name="event_name"
					       type="text" 
					       class="form-control col-lg-4" 
					       value="{{ old('event_name') }}">
					@if($errors->has('event_name'))
				    <span class="error text-danger">{{ $errors->first('event_name') }}</span>
				    @endif					
				</div>

				<div id="event_date_group" class ="form-group">
					<label for="event_date">Event Date</label>
					<div class="d-flex">
						<input id="event_date" 
						       name="event_date" 
						       type="text" class="form-control col-lg-2" 
						       value="{{ old('event_date') }}">
					    <!--<span class="input-group-addon px-md-1">
		                    <span class="fa fa-calendar">
		                    </span>
		                </span>-->

		            </div>
					@if($errors->has('event_date'))
				    <span class="error text-danger">{{ $errors->first('event_date') }}</span>
				    @endif					
				</div>

				<div class ="form-group">
					<label for="cutoff_date">Cutoff Date</label>
					<div class="d-flex">
						<input id="cutoff_date" 
						       name="cutoff_date" 
						       type="text" class="form-control col-lg-2" 
						       value="{{ old('cutoff_date') }}">
					    <!--<span class="input-group-addon px-md-1">
		                    <span class="fa fa-calendar">
		                    </span>
		                </span>-->
		            </div>
					@if($errors->has('cutoff_date'))
				    <span class="error text-danger">{{ $errors->first('cutoff_date') }}</span>
				    @endif					
				</div>


				<div class ="form-group">
					<label for="event_time">Time</label>
					<input id="event_time" 
					       name="event_time" 
					       type="time" class="form-control col-lg-2" 
					       value="{{ old('event_time', '12:00') }}">

					@if($errors->has('event_time'))
				    <span class="error text-danger">{{ $errors->first('event_time') }}</span>
				    @endif					
				</div>				

				<div class="card mt-5">
				  <h3 class="card-header text-center 
				             font-weight-bold py-4">Menu Items Available</h3>
				  <div class="card-body">
				    <div id="table" class="table-editable">
				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				          	<th scope="col" class="text-center">Selected</th>
				            <th scope="col" class="text-center">Item Name</th>
				            <th scope="col" class="text-center">Description</th>
				            <th scope="col" class="text-center">Category</th>
				            <th scope="col" class="text-center">Price</th>
				            <th scope="col" class="text-center">Final Price</th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($menu_items as $item)
				            <tr scope="row">
				            	<td>
				            		@php

									if(is_array(old('event_items')) && in_array($item->iditem, old('event_items')))
									{
									    $checked= 'checked';
						            }
						            else{
						            	$checked='';
						            }
						            @endphp
						            
				            		<input name="event_items[]"
					                       class="form-check-input text-center"
		    	                           type="checkbox" 
		    	                           value="{{ $item->iditem }}"
										   {{ $checked }}
		    	                           >
				            	</td>
					            <td>{{ $item->item_name }}</td>
					            <td>{{ $item->description }}</td>
					            <td>{{ $item->category }}</td>
					            <td>{{ $item->price }}</td>
					            <td style="min-width:120px">
					                <input name="{{ 'iditem' . $item->iditem }}" 
		    	                           type="hidden" 
		    	                           value="{{ $item->iditem }}">
					                <input name="{{ 'idfinalprice' . $item->iditem }}"
					                       class="form-control text-right col-lg-12"
		    	                           type="text" 
		    	                           value="{{ number_format($item->price + ($item->price * $school->markup/100),2) }}">
		    	                </td>
				            </tr>
				            @endforeach
				         </tbody>
				      </table>
				    </div>
				  </div>
				</div>

				<div class="row mt-5">
					<button name="submit" 
					        type="submit" 
					        id="form-submit"
					        class="button mr-3">Save</button>

					<a name="btn-cancel" 
					        id="btn-cancel"
					        class="button"
					        href="/schools/events">Cancel</a>
				</div>
				
			</form>

	</div>

</div>


@endsection