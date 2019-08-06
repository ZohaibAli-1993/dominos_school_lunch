<?php

namespace App\Http\Controllers\Schools;

use App\School;

use App\Province;
use App\Store;
use App\Setup;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolsController extends Controller
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

        $provinces= Province::pluck('province_name','province');

        $stores= Store::pluck('name','idstore');

        return view('main.school_registration', compact('provinces', 'stores'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'school_name' => 'required|string|min:10',
            'city' => 'required|string',
            'province'=>'required',
            'idstore' => 'required',
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'coordinator_first_name' => 'required|string|min:3',
            'coordinator_last_name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{3}[\-\s]?[0-9]{3}[\-\s]?[0-9]{4}$/',
            'password' => 'required|regex:/(?=.*[0-9]+)(?=.*[A-Z]).{8,}/',
            'verify_password' => 'required_with:password|same:password|regex:/(?=.*[0-9]+)(?=.*[A-Z]).{8,}/'
        ]);

        $valid['password'] = Hash::make($valid['password']);

        $school = School::create($valid);

        /**
         * create token for a new school
         * 
         */
        $words = preg_split("/\s+/", $valid['school_name']);
        $acronym = "";

        foreach ($words as $w) {
            $acronym .= $w[0];
        }
        /**
         * update token to the new school 
         * 
         */
        $school = School::find($school['idschool']);

        $school['token'] = $acronym.$school['idschool'];

        /**
         * update default markup price from setup table to the new school 
         * 
         */
        $setup = Setup::find(1);

        $school['markup']= $setup['markup_default'];

        $school->save();

        /**
         * create new school as a new user. 
         * 
         */

        $user['name'] = $school['coordinator_first_name']. ' '. $school['coordinator_last_name'];

        $user['email'] = $school['email'];

        $user['password'] = $school['password'];

        $user['type'] = 'school';

        $new_user= User::create($user);

        return back()->with('success','School was added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }

}

