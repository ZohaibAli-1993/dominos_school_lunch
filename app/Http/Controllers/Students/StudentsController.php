<?php

namespace App\Http\Controllers\Students;

use App\Student;
use App\ParentRegister;
use App\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ParentRegister $parentRegister)
    {
        $students = Student::where('idparent', $parentRegister->idparent)->get();
        $school = School::pluck('school_name', 'idschool');

        return view('parents.index', compact('students', 'parentRegister', 'school'));
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
            'first_name' =>'required|string' ,
            'last_name' => 'required|string',
            'idparent' => 'required|integer'

        ]);

        $valid['idparent'] = $parentRegister['idparent'];

        $student = Student::create($valid);
        return redirect('/parents/'.$parentRegister['idparent'])->with('success', 'You added a new child!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
