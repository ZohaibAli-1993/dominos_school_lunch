<?php

namespace App\Http\Controllers\Schools;

use App\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
          
        return view('schools.classrooms', compact('classrooms'));

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
        $valid = $request->validate([
            'classroom'=>'required',
            'description' => 'required',
        ]);


        $new_classroom = Classroom::create($valid);
 
        return redirect('/schools/classrooms');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $valid = $request->validate([
            'classroom'=>'required',
            'description' => 'required',
        ]);

        $classroom=Classroom::find($valid['idclassroom']);
        $classroom->title = $valid['classroom'];
        $classroom->body = $valid['description'];
        $classroom->save();

        return redirect('/schools/classrooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect('/schools/classrooms');

    }
}
