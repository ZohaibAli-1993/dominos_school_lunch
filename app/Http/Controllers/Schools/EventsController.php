<?php

namespace App\Http\Controllers\Schools;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\School;
use App\Setup;
use App\Calendar;
use App\MenuItem;
use Carbon\Carbon;

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

        return view('events.create', 
            compact('setup', 'calendar', 'school', 'menu_items' ));

        /**
         * Read setup table to get cutoff_days
         * 
         */
        $setup = Setup::find(1);

        // Read calendar table to get begin and end dates

        $calendar = DB::table('calendars_act_vw')->first();

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
            'event_time' => 'required',
        ]);

        //Verify if the store determinated by the school has maximum of events
        //for the event date
        $max_capacity = DB::table('max_capacity_vw')->
        where('idstore', $request['idstore'])->
        where('event_date', $valid['event_date'])->
        get();

        //If there is any value, the store reached max capacity 
        foreach ($max_capacity as $store) {
            $validator = \Validator::make([], []); 
            $validator->errors()->add('event_date', 
                'The store selected for your school has been reach maximum numbers of events in this date');
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        //Insert new Event in the table
        $event = new Event($valid);
        $event->created_at = Carbon::now();
        $event->updated_at = Carbon::now();
        $event->save();
        $idevent = $event->idevent;

        //If any menu item was checked, insert event items in table
        $count = count($request->input('event_items'));
        if($count){

            for ($i=0; $i<$count; $i++){
                $data[] = array(
                'idevent' => $idevent,    
                'iditem' => $request->input('event_items')[$i],
                'final_price' => 
                    $request->input('idfinalprice'. 
                    $request->input('event_items')[$i] )
                );
            }

            DB::table("event_items") -> insert($data); 
        }

       return redirect('/schools/events')->with('success', 'Event has been added');
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

        // Read setup table to get cutoff_days
        $setup = Setup::find(1);

        // Read calendar table to get begin and end dates

        $calendar = DB::table('calendars_act_vw')->first();

        // Get list of menu_items
        $menu_items = DB::table('menu_selected_vw')->
                      where('idevent', $event->idevent)->get();

        return view('events.edit', 
               compact('event', 'setup', 'calendar', 'school', 'menu_items' ));
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
      

        //Verify if the event date was updated
        if($valid['event_date']!=$event['previous_event_date']){

            //Verify if the store determinated by the school has maximum of events
            //for the event date
            $max_capacity = DB::table('max_capacity_vw')->
            where('idstore', $request['idstore'])->
            where('event_date', $valid['event_date'])->
            get();

            //If there is any value, the store reached max capacity 
            foreach ($max_capacity as $store) {
                $validator = \Validator::make([], []); // Empty data and rules fields
                $validator->errors()->add('event_date', 
                    'The store selected for your school has been reach maximum numbers of events in this date');
                throw new \Illuminate\Validation\ValidationException($validator);
            }
        }

        //Update values for the event
        $event = Event::find($valid['idevent']);
        $event->event_name = $valid['event_name'];
        $event->event_date = $valid['event_date'];
        $event->cutoff_date = $valid['cutoff_date'];
        $event->event_time = $valid['event_time'];
        $event->updated_at = Carbon::now();
        $event->save();

        //Delete previous events_items
        DB::table('event_items')->where('idevent', $valid['idevent'])->delete();

        //If any menu item was checked, insert event items in table
        $count = count($request->input('event_items'));
        if($count){

            for ($i=0; $i<$count; $i++){
                $data[] = array(
                'idevent' => $valid['idevent'],    
                'iditem' => $request->input('event_items')[$i],
                'final_price' => 
                    $request->input('idfinalprice'. 
                    $request->input('event_items')[$i] )
                );
            }

            DB::table("event_items") -> insert($data); 
        }

        
        return redirect('/schools/events')->
               with('success', 'Event has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        $event->is_active = 0;
        $event->updated_at = Carbon::now();

        if($event->save()){
            return redirect('/schools/events')->
                   with('success', 'Event has been inactivated.');
        }

        return redirect('/schools/events')->
               with('error', 'There was a problem inactiving that event');
    }
}