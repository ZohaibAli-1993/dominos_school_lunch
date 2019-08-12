<?php

namespace App\Http\Controllers\Dominos;

use App\Calendar;
use App\Setup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CalendarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        // Read calendar table 
        $calendars = Calendar::all();

        return view('admin.calendar', compact('calendars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {

        //Verify if it is a new calendar
        if($request['idcalendar']=="new"){
            // Validate form submission
            $valid = $request->validate([
                'school_year' => 'required|string|max:9',
                'begin_dt' => 'required|date',
                'end_dt' => 'required|date',
                'is_active' => 'required|integer'
            ]);

            //Insert new calendar in the table
            $calendar_rec = new Calendar($valid);
            $calendar_rec->created_at = Carbon::now();
            $calendar_rec->updated_at = Carbon::now();
            $calendar_rec->save();
            return redirect('/dominos/calendars')->
               with('success', 'Calendar has been added.');
        }else
        {
            // Validate form submission
            $valid = $request->validate([
                'idcalendar' => 'required|string',
                'school_year' => 'required|string|max:9',
                'begin_dt' => 'required|date',
                'end_dt' => 'required|date',
                'is_active' => 'required|integer'
            ]);    

            //Update values for calendar
            $calendar_rec = Calendar::find($valid['idcalendar']);
            $calendar_rec->school_year = $valid['school_year'];
            $calendar_rec->begin_dt = $valid['begin_dt'];
            $calendar_rec->end_dt = $valid['end_dt'];
            $calendar_rec->is_active = $valid['is_active'];
            $calendar_rec->updated_at = Carbon::now();
            $calendar_rec->save();
            return redirect('/dominos/calendars')->
               with('success', 'Calendar has been updated.');                      
        }

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        //
    }

}

