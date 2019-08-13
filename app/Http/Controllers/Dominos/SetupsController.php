<?php

namespace App\Http\Controllers\Dominos;

use App\Setup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class SetupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function show(Setup $setup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function edit(Setup $setup)
    {
        // Read setup table 
        $setup = Setup::find(1);

        return view('admin.setup', compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setup $setup)
    {
        
        // Validate form submition
        $valid = $request->validate([
            'idsetup' => 'required|integer',
            'store_max_events' => 'required|integer',
            'markup_default' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'cutoff_days' => 'required|integer',
            'available_weekends' => 'required|integer'
        ]);

        //Update values for setup
        $setup = Setup::find(1);
        $setup->store_max_events = $valid['store_max_events'];
        $setup->markup_default = $valid['markup_default'];
        $setup->cutoff_days = $valid['cutoff_days'];
        $setup->available_weekends = $valid['available_weekends'];
        $setup->updated_at = Carbon::now();
        $setup->save();

        return redirect('/dominos/setup')->
               with('success', 'Setup has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setup  $setup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setup $setup)
    {
        //
    }
}
