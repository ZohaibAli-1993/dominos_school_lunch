<?php

namespace App\Http\Controllers\Schools;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\School;
use App\Setup;
use App\Calendar;
use App\MenuItem;

use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $school_id = 1;   // ***** Alessandra - It is necessary to update according school logged in

        //Get school data
        $school = School::where('idschool', $school_id)->first();

        //Get events list according to the school logged in
        $events_list = DB::table('events_vw')->where('idschool', $school_id)->get();

        $school = 1;   // It is necessary to update according school logged in
       // $events = Event::where('idschool', $school);
        $events_list = DB::table('events_vw')->get();

        $year_prev = 0;
        $month_prev = 0;
        $day_prev = 0;

        $events = array();

        foreach ($events_list as $event) {
            if (($event->year_event != $year_prev) or
                ($event->month_event != $month_prev) or
                ($event->day_event != $day_prev)) {
                $year_prev = $event->year_event;
                $month_prev = $event->month_event;
                $day_prev = $event->day_event;
                $events[$event->year_event]
                       [$event->month_event]
                       [$event->day_event]= array();
            }

            $values = array('startTime' => $event->event_time,
                            'endTime' => $event->event_time,
                            'text'=> $event->event_name,
                            'idevent'=> $event->idevent );
            array_push($events[$event->year_event]
                              [$event->month_event]
                              [$event->day_event], $values);
        }

        return view('events.index', compact('events', 'events_list', 'school'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $school_id = 1;   // ***** Alessandra - It is necessary to update according school logged in

        //Get school data
        $school = School::where('idschool', $school_id)->first();
        
        // Read setup table to get cutoff_days
        $setup = Setup::find(1);

        // Get first active calendar table to get begin and end dates
        $calendar = DB::table('calendars_act_vw')->first();

        // Get list of menu_items
        $menu_items = DB::table('menu_items_vw')->get();
        //$menu_items = MenuItem::get();

        return view('events.create', 
            compact('setup', 'calendar', 'school', 'menu_items' ));

        /**
         * Read setup table to get cutoff_days
         * 
         */
        $setup = Setup::find(1);

        /**
         * Read calendar table to get begin and end dates
         * 
         */
        $calendar = Calendar::find(1);  //////****** alter to get next calendar

        return view('events.create', compact('setup', 'calendar' ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate form submition
        $valid = $request->validate([
            'idschool' => 'required|integer',
            'event_name' => 'required|string',
            'event_date' => 'required|date',
            'cutoff_date' => 'required|date',
            'event_time' => 'required'
        ]);

       //Insert new Event in the table

       $event = Event::create($valid);

        //If any menu item was checked, insert event items in table
      /*if(count(request('event_items'))){
            $event->eventItems()->attach(request('event_items'));
       }*/

       return redirect('/schools/events')->with('success', 'Event was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        $school_id = 1;   // ***** Alessandra - It is necessary to update according school logged in

        //Get school data
        $school = School::where('idschool', $school_id)->first();

        /**
         * Read setup table to get cutoff_days
         * 
         */
        $setup = Setup::find(1);

        /**
         * Read calendar table to get begin and end dates
         * 
         */

        $calendar = DB::table('calendars_act_vw')->first();

        return view('events.edit', compact('event', 'setup', 'calendar', 'school' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

        // Validate form submition
        $valid = $request->validate([
            'idevent' => 'required|integer',
            'idschool' => 'required|integer',
            'event_name' => 'required|string',
            'event_date' => 'required|date',
            'cutoff_date' => 'required|date',
            'event_time' => 'required'
        ]);
      
        //Update values for the event
        $event = Event::find($valid['idevent']);
        $event->event_name = $valid['event_name'];
        $event->event_date = $valid['event_date'];
        $event->cutoff_date = $valid['cutoff_date'];
        $event->event_time = $valid['event_time'];
        $event->save();

        
        return redirect('/schools/events')->with('success', 'Event was updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}