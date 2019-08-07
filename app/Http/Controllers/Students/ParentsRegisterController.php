<?php

namespace App\Http\Controllers\Students;

use App\ParentRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentsRegisterController extends Controller
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
     * @param  \App\ParentRegister  $parentRegister
     * @return \Illuminate\Http\Response
     */
    public function show(ParentRegister $parentRegister)
    {
        return view('parents.index', compact('parentRegister')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParentRegister  $parentRegister
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentRegister $parentRegister)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParentRegister  $parentRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParentRegister $parentRegister)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParentRegister  $parentRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentRegister $parentRegister)
    {
        //
    }
}
