<?php

namespace App\Http\Controllers\Students;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parent;
class ParentsController extends Controller
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
        //vaidation for comments form
       $valid=$request->validate([  
        
        'first_name'=> 'required|string' , 
        'last_name'=> 'required|string' ,  
        'email'=>'required|string', 
        'phone'=>'required|string',  
        'password'=>'required|string',
        'captcha'=>'required|string'

        
        
       ]); 
     
      var_dump($valid);
     // Parent::create($valid);  
      //back to post through flash message
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function show(Parent $parent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function edit(Parent $parent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parent $parent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parent $parent)
    {
        //
    }
}
