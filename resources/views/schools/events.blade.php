@extends('layouts.app')

@section('content')

<div id='calendar_events' class="container">
    @include('partials.errors')


    <h1>Events</h1>


	<div class="row">
		<div class="col">
			<div id="calendarContainer"></div>
		</div><!-- col ends -->
		<div class="col">
			<div id="organizerContainer"></div>
		</div><!-- col ends -->

	</div><!-- row ends -->
</div>

<script src="{{asset('js/calendarorganizer.js')}}"></script>

<script>
	"use strict";

	// function that creates dummy data for demonstration
	function createDummyData() {
		var date = new Date();
		var data = {};

		for (var i = 0; i < 10; i++) {
			data[date.getFullYear() + i] = {};

			for (var j = 0; j < 12; j++) {
				data[date.getFullYear() + i][j + 1] = {};

				for (var k = 0; k < Math.ceil(Math.random() * 10); k++) {
					var l = Math.ceil(Math.random() * 28);

					try {
						data[date.getFullYear() + i][j + 1][l].push({
							startTime: "10:00",
							endTime: " ",
							text: "Some Event Here"
						});
					} catch (e) {
						data[date.getFullYear() + i][j + 1][l] = [];
						data[date.getFullYear() + i][j + 1][l].push({
							startTime: "10:00",
							endTime: " ",
							text: "Some Event Here"
						});
					}
				}
			}
		}

		return data;
	}

	// creating the dummy static data
	var data = createDummyData();

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
			// placeholder: "" // Removes Organizer's Placeholder
			placeholder: "<button style='width: calc(100% - 16px); background-color: #E6E6E6; border-radius: 6px; margin: 8px; border: none; padding: 12px 0px; cursor: pointer;'>Add New Event</button>",
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