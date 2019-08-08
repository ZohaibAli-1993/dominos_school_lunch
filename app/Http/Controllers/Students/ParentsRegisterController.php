<?php

namespace App\Http\Controllers\Students;
use Illuminate\Support\Facades\Hash; 
use App\User;
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
    public function index(ParentRegister $parentRegister)
    {
        return view('parents.add_student', compact('parentRegister'));
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
         request()->validate([

            

            'captcha' => 'required|captcha'

        ],

        ['captcha.captcha'=>'Invalid captcha code.']);
        //vaidation for comments form
       $valid=$request->validate([  
        
       'first_name'=> 'required|string' , 
       'last_name'=> 'required|string' ,  
       'email'=>'required|string', 
       'phone' => 'required|regex:/^[0-9]{3}[\-\s]?[0-9]{3}[\-\s]?[0-9]{4}$/',
        'password' => 'required|regex:/(?=.*[0-9]+)(?=.*[A-Z]).{8,}/',
        'verify_password' => 'required_with:password|same:password|regex:/(?=.*[0-9]+)(?=.*[A-Z]).{8,}/'
      ]);  
       
       $valid['password'] = Hash::make($valid['password']);
       $parent=ParentRegister::create($valid); 
        $user['name'] = $parent['first_name']. ' '. $parent['last_name'];

        $user['email'] = $parent['email'];

        $user['password'] = $parent['password'];

        $user['type'] = 'Parents';

        $new_user= User::create($user);
      return back()->with('success','Parent was added!'); 
      

        
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
