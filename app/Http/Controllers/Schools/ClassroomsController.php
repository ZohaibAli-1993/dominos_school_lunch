<?php

namespace App\Http\Controllers\Schools;

use App\Classroom;
use App\School;
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


        $classroom = Classroom::create($valid);
 
        return redirect('/schools/classrooms')->with('success', 'New classroom has been added to the list');
    }


    /**
     * Show upload file window
     */
    public function showUpload()
    {
        return view('/schools.upload');
    }



    /**
     * Store classroom information into database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFileContents(Request $request)
    {
        $upload=$request->file('upload-file');

        if(!$upload){

            return back()->with('error','Please upload file');
        }

        $filepath=$upload->getRealPath();

        $file=fopen($filepath,'r');

        $header=fgetcsv($file);

        $escaped_header = [];

        foreach($header as $key => $value)
        {
            $lowercase_header= strtolower($value);
            
            $escaped_header_item = preg_replace('/[^a-z]/','',$lowercase_header);

            array_push($escaped_header, $escaped_header_item);

        }

        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }

            foreach($columns as $key => $value)
            {
                $value=preg_replace('/\D/','',$value);
            }

            $data = array_combine($escaped_header, $columns);

            //Table update
            
            $classroom = $data['classroom'];

            $description= $data['description'];

            $new_classroom = [$classroom, $description];

            $class= new Classroom();

            $class->classroom = $classroom;

            $class->description = $description;

            $class->save();

        }

        return redirect('schools/classrooms')->with('success','Data Uploaded Successfully');
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
        return view('schools.edit_classroom', compact('classroom'));
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
            'idclassroom' => 'required'
        ]);

        $classroom=Classroom::find($valid['idclassroom']);
        $classroom->classroom = $valid['classroom'];
        $classroom->description = $valid['description'];
        $classroom->save();
        $classroom->touch();

        return redirect('/schools/classrooms')->with('success','Classroom information has been updated');
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
        return redirect('/schools/classrooms')->with('success','Classroom has been removed from list');

    }
}
