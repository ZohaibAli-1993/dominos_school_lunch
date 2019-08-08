@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/calendarorganizer.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('content')

<script type="text/javascript">
	/*
	 * On change of the event date, recalculate cutoff date
	 */
	/*$('#event_date').on('change', function(e){
       $(this).closest('form').submit();
    });*/

	/*
	 * Defines event date as datepicker, creating default values
	 */
    $( function() {
		$( "#event_date" ).datepicker({
		    minDate: new Date(2019, 9 - 1, 1),
		    maxDate: new Date(2020, 6 - 1, 30),
		    daysOfWeekDisabled: [0, 6]
		});
    } );

	/*
	 * Defines cutoff date as datepicker, creating default values
	 */
    $( function() {
		$( "#cutoff_date" ).datepicker({
		    minDate: new Date(),
		    maxDate: new Date(2020, 6 - 1, 30),
		    daysOfWeekDisabled: [0, 6]
		});
    } );    

</script>

<div class="container mb-5">

	<div class="col">

		    <h1>Edit Event</h1>

		    @include('partials.errors')

		    <form id="form" action="/schools/events" method="post">


		    	@csrf <!-- to create csrf token in the form -->

		    	@method('PUT')

		    	<input id="idevent" name="idevent" type="hidden" value="{{ $event->idevent }}">

		    	<input id="idschool" name="idschool" type="hidden" value="{{ $event->idschool }}">

		        <div class ="form-group">
					<label for="event_name">Event Name</label>
					<input id="event_name" 
					       name="event_name"
					       type="text" 
					       class="form-control col-lg-4" 
					       value="{{ old('event_name', $event->event_name) }}">
					@if($errors->has('event_name'))
				    <span class="error text-danger">{{ $errors->first('event_name') }}</span>
				    @endif					
				</div>

				<div class ="form-group">
					<label for="event_date">Event Date</label>
					<div class="d-flex">
						<input id="event_date" 
						       name="event_date" 
						       type="text" class="form-control col-lg-2" 
						       value="{{ old('event_date', $event->event_date) }}">
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
						       value="{{ old('cutoff_date', $event->cutoff_date) }}">
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
					       value="{{ old('event_time', $event->event_time) }}">

					@if($errors->has('event_time'))
				    <span class="error text-danger">{{ $errors->first('event_time') }}</span>
				    @endif					
				</div>				

				<button name="submit" 
				        type="submit" 
				        id="form-submit"
				        class="btn btn-primary">Submit</button>

				<a name="btn-cancel" 
				        id="btn-cancel"
				        class="btn btn-primary"
				        href="/schools/events">Cancel</a>
								        
				
			</form>

	</div>

</div>






@endsection