<?php

namespace App\Http\Controllers\Schools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class ReportsController extends Controller
{


    /**
     * Display report options.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('schools.reports.index');

    }


    /**
     * Display a list of students registered in classrooms
     *
     * @return \Illuminate\Http\Response
     */
    public function classrooms()
    {

        $school_id = auth()->user()->idschool;

        //Get school data
        $school = School::where('idschool', $school_id)->first();

        //Get classrooms/students list according to the school logged in
        $classrooms_list = 
        DB::table('classrooms_students_vw')->where('idschool', $school_id)->get();

        return view('schools.reports.classrooms',
               compact('classrooms_list', 'school'));

    }


    /**
     * Display a list of parents with students registered in classrooms
     *
     * @return \Illuminate\Http\Response
     */
    public function parents()
    {

        $school_id = auth()->user()->idschool;

        //Get school data
        $school = School::where('idschool', $school_id)->first();

        //Get classrooms/students list according to the school logged in
        $parents_list = 
        DB::table('parents_students_vw')->where('idschool', $school_id)->get();

        return view('schools.reports.parents',
               compact('parents_list', 'school'));

    }

    /**
     * Display a list of students registered in classrooms
     *
     * @return \Illuminate\Http\Response
     */
    public function students()
    {

        $school_id = auth()->user()->idschool;

        //Get school data
        $school = School::where('idschool', $school_id)->first();

        //Get classrooms/students list according to the school logged in
        $students_list = 
        DB::table('students_vw')->where('idschool', $school_id)->get();

        return view('schools.reports.students',
               compact('students_list', 'school'));

    }

    /**
     * Display a list of orders
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {

        $school_id = auth()->user()->idschool;

        //Get school data
        $school = School::where('idschool', $school_id)->first();

        //Get classrooms/students list according to the school logged in
        $event_orders_list = 
        DB::table('events_orders_vw')->where('idschool', $school_id)->get();

        return view('schools.reports.orders',
               compact('event_orders_list', 'school'));

    }    

    /**
     * Download a csv file with report results
     *
     * @return \Illuminate\Http\Response
     */
    public function download($file)
    {
    	$school_id = auth()->user()->idschool;
    
	    if($file=="classrooms"){
	    	//Get classrooms/students list according to the school logged in
	        $table = 
	        DB::table('classrooms_students_vw')->
	        	where('idschool', $school_id)->get()->toArray();
	        $filename = "classrooms.csv";  	
	        $fields = ['classroom', 'description', 'first_name', 'last_name'];
	    }elseif($file=="parents"){
		    	//Get parents/classrooms/students list according 
		    	//to the school logged in
		        $table = 
		        DB::table('parents_students_vw')->
		        	where('idschool', $school_id)->get()->toArray();
		        $filename = "parents.csv";  	
		        $fields = ['parent_first_name', 'parent_last_name', 'email', 
		        'classroom', 'description', 'first_name', 'last_name'];
	    }elseif($file=="students"){
		    	//Get parents/classrooms/students list according 
		    	//to the school logged in
		        $table = 
		        DB::table('students_vw')->
		        	where('idschool', $school_id)->get()->toArray();
		        $filename = "students.csv";  	
		        $fields = ['first_name', 'last_name', 
		        'classroom', 'description', 'parent_first_name',
		        'parent_last_name', 'email'];
	    }elseif($file=="orders"){
		    	//Get event_orders list according 
		    	//to the school logged in
		        $table = 
		        DB::table('event_orders_vw')->
		        	where('idschool', $school_id)->get()->toArray();
		        $filename = "events_orders.csv";  	
		        $fields = ['event_date', 'event_name', 
		        'cutoff_date', 'event_time', 'classroom',
		        'description', 'first_name', 'last_name', 'idorder'];
	    }	    

	    $handle = fopen('../tmp/' . $filename, 'w+');
	    fputcsv($handle, $fields);

	    foreach($table as $result) {
	    	$values=[];
	    	$row = (array) $result;
	    	foreach($fields as $value){
	    		array_push($values, $row[$value]);
	        }
	        fputcsv($handle, $values);
	    }

	    fclose($handle);

	    $headers = array(
	        'Content-Type' => 'text/csv',
	    );

        return response()->download('../tmp/' . $filename, $filename, $headers);
    }


}
