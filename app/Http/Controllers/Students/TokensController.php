<?php

namespace App\Http\Controllers\Students;

use App\Token;
use App\School;
use App\ParentRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokensController extends Controller
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
    public function store(Request $request, ParentRegister $parentRegister)
    {
        $valid = $request->validate([
            'idparent'=> 'required|integer',
            'token' => 'required|string'
        ]);

        $school = School::where('token', $valid['token'])->first();

        if(!$school)
        {
           return back()->with('error','Token is invalid');
        }

        $valid['idschool'] = $school['idschool'];

        $token_add = Token::create($valid);

        return redirect('/parents/'.$parentRegister['idparent'].'/'.$school['token'].'/student/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function show(Token $token)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function edit(Token $token)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Token $token)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Token  $token
     * @return \Illuminate\Http\Response
     */
    public function destroy(Token $token)
    {
        //
    }
}