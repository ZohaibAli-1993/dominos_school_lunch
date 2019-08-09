<?php

namespace App\Http\Controllers\Students;

use App\Student;
use App\Token;
use App\ParentRegister;
use App\School;
use App\Classroom;
use Illuminate\Support\Facades\Hash;
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

        return view('parents.addStudent', compact('parentRegister', 'token'));
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
            'idparent' => 'required|integer',
            'token' => 'required|string',
            'idclassroom' => 'required|integer'

        ]);

        $valid['idparent'] = $parentRegister['idparent'];

        $student = Student::create($valid);

        $school = School::where('token', $valid['token'])->first();

        if(!$school)
        {
           return back()->with('error','Token is invalid');
        }

        $valid['idschool'] = $school['idschool'];

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

    public function edit(ParentRegister $parentRegister ,Student $student)
    {
        $classrooms = Classroom::where('idschool', $student['idschool'])->get();

        return view('parents.editStudent', compact('parentRegister', 'student', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,ParentRegister $parentRegister, Student $student)
    {
        $valid = $request->validate([
            'first_name' =>'required|string' ,
            'last_name' => 'required|string',
            'idparent' => 'required|integer',
            'idclassroom' => 'required|integer'
        ]);

        $student = Student::find($student['idstudent']);
        $student['idclassroom'] = $valid['idclassroom'];
        $student['first_name'] = $valid['first_name'];
        $student['last_name'] = $valid['last_name'];

        $student->save();

        return redirect('/parents/'.$parentRegister['idparent'])->with('success','Successfully edit student profile!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {


        if($student->delete()) {
            return back()->with('success','Student was deleted');
        } 
        
        return back()->with('error','There was a problem deleting that post');

    }
}
