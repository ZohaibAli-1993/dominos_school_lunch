<?php

namespace App\Http\Controllers\Dominos;

use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ProvincesController extends Controller
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
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        // Read provinces table 
        $provinces = Province::all();

        return view('admin.provinces', compact('provinces'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {

        // Validate form submission
        $valid = $request->validate([
            'province' => 'required|string',
            'gst_rate' => 'required|string',
            'pst_rate' => 'required|string',
            'hst_rate' => 'required|string',
            'qst_rate' => 'required|string'
        ]);    

        //Update values for province
        $province_rec = Province::find($valid['province']);
        $province_rec->gst_rate = $valid['gst_rate'];
        $province_rec->pst_rate = $valid['pst_rate'];
        $province_rec->hst_rate = $valid['hst_rate'];
        $province_rec->qst_rate = $valid['qst_rate'];
        $province_rec->updated_at = Carbon::now();
        $province_rec->save();
        return redirect('/dominos/provinces')->
           with('success', 'Province has been updated.');                      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        //
    }
}
