<?php

namespace App\Http\Controllers\Students;
use Illuminate\Support\Facades\Hash; 
use App\User;
use App\School;
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ParentRegister $parentRegister)
    {
        return view('parents.add_student', compact('parentRegister'));
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

        $user['idparents'] = $school['idparents'];

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
        return view('parents.editParents', compact('parentRegister'));
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
        $valid = $request->validate([
            'idparent'=> 'required|integer',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=> 'required|email',
            'phone'=> 'required|regex:/^(?(?=.*\))\()[0-9]{3}[\)]?[\-\s]?[0-9]{3}[\-\s]?[0-9]{4}$/'
        ]);

        $parentRegister = ParentRegister::find($valid['idparent']);

        $parentRegister->first_name = $valid['first_name'];
        $parentRegister->last_name = $valid['last_name'];
        $parentRegister->email = $valid['email'];
        $parentRegister->phone = $valid['phone'];
        

        $parentRegister->save();

        return redirect('/parents/'.$parentRegister['idparent'])->with('success','Your profile was changed!');
    }

    /**
     * [editPass description] To show change password form
     * @param  ParentRegister $parentRegister [description]
     * @return [type]                         [description]
     */
    public function editPass(ParentRegister $parentRegister)
    {
        return view('parents.changePass', compact('parentRegister'));
    }


    /**
     * [update description]To update parents password
     * @param  Request        $request        [description]
     * @param  ParentRegister $parentRegister [description]
     * @return [type]                         [description]
     */
    public function updatePass(Request $request, ParentRegister $parentRegister)
    {
        $valid = $request->validate([
            'current_pass'=> 'required',
            'password' => 'required|regex:/(?=.*[0-9]+)(?=.*[A-Z]).{8,}/',
            'new_pass' => 'required_with:password|same:password|regex:/(?=.*[0-9]+)(?=.*[A-Z]).{8,}/'
        ]);

        if(!Hash::check($valid['current_pass'],$parentRegister['password'])){
            return redirect('/parents/'.$parentRegister['idparent'])->with('error','Incorrect Password!');
        }

        $user = Auth::user();

        $user->password = Hash::make($valid['password']);

        $user->save();

        $parentRegister->password = Hash::make($valid['password']);

        $parentRegister->save();

        return redirect('/parents/'.$parentRegister['idparent'])->with('success','Your profile was changed!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParentRegister  $parentRegister
     * @return \Illuminate\Http\Response
     */
    public function updateSession(Request $request, ParentRegister $parentRegister)
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

        $request->session()->put('idschool', $school['idschool']);

        return redirect('/parents/'.$parentRegister['idparent'].'/'.$school['token'].'/student/add');
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
