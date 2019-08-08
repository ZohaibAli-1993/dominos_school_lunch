@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/calendarorganizer.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')

<div class="container">

	@include('partials.errors')

	<h1>Events</h1>



	<div id="calendar_events">

		<div class="row">
			<div class="col">
				<div id="calendarContainer"></div>
			</div><!-- col ends -->
			<div class="col">
				<div id="organizerContainer"></div>
			</div><!-- col ends -->


		</div><!-- row ends -->

	</div>

    <div class="container" style="text-align: center;">
	    <div class="col">
		    <form class="form" action="/posts" method="post">

	            @csrf
	            <div class="form-group">
	                <button class="btn btn-primary">Add New Event</button>
	            </div>
            </form>

        </div>
    </div>

    <div class="container">
    	<div class="row">
	    	<div class="col">
	    		<h3>Upcoming Events</h3>
	    	</div>
	    </div>

		@foreach($events_list as $event)
	    <div class="row border-bottom" style="margin-top: 15px;">
	    	<div class="col-3">
	    		<h4>{{ $event->event_date_formated  }}</h4>
	    	</div>
    	   	<div class="col-3 ">
	    		<h4>{{ $event->event_time_formated }}</h4>
	    	</div>
    	   	<div class="col-3 ">
	    		<h4>{{ $event->event_name }}</h4>
	    	</div>
    	   	<div class="col-3 ">

	            <p><a class="btn btn-primary" 
	            	   href="/schools/events/edit/{{ $event->idevent }}">Edit</a><p>
	    	</div>	    	
        </div>
        @endforeach
    </div>
</div>

<script src="{{asset('js/calendarorganizer.js')}}"></script>

<script>
	"use strict";

	// Getting exiting events dates 
	var data = {!! json_encode($events) !!};

	// initializing a new calendar object, that will use an html container to create itself
	var calendar = new Calendar("calendarContainer", // id of html container for calendar
		"small", // size of calendar, can be small | medium | large
		[
			"Sunday", // left most day of calendar labels
			3 // maximum length of the calendar labels
		], [
			"#E31837", // primary color
			"#b6131c", // primary dark color
			"#ffffff", // text color
			"#ffecb3" // text dark color
		],
		{
			placeholder: "", // Removes Organizer's Placeholder
			//placeholder: "<button style='width: calc(100% - 16px); background-color: #E6E6E6; border-radius: 6px; margin: 8px; border: none; padding: 12px 0px; cursor: pointer;'>Add New Event</button>",
			indicator: true,
			indicator_type: 0, // indicator type, can be 0 (not numeric) | 1 (numeric)
			indicator_pos: "top" // indicator position, can be top | bottom
		}
	);

	// initializing a new organizer object, that will use an html container to create itself
	var organizer = new Organizer("organizerContainer", // id of html container for calendar
		calendar, // defining the calendar that the organizer is related to
		data // giving the organizer the static data that should be displayed
	);
</script>





@endsection