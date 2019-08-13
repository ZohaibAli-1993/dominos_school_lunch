<?php

namespace App\Http\Controllers\Students;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Event;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
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
        $all_inputs = $request->all();
        
       
        
        $valid = $request->validate([
            'idevent' =>'required|integer',
            'idstudent' =>'required|integer',
            'idschool' =>'required|integer',
            'idclassroom' =>'required|integer',
            'amount' =>'required|numeric',
        ]);   
        $school = DB::table('schools')->where('idschool','=',$valid['idschool'])->first();
        $gst_rate = DB::table('provinces')->where('province','=',$school->province)->first()->gst_rate;
        $pst_rate = DB::table('provinces')->where('province','=',$school->province)->first()->pst_rate;
        $hst_rate = DB::table('provinces')->where('province','=',$school->province)->first()->hst_rate;
        $qst_rate = DB::table('provinces')->where('province','=',$school->province)->first()->qst_rate;


        $valid['calculated_gst'] = $gst_rate * $valid['amount'] * 0.01;
        $valid['calculated_pst'] = $pst_rate * $valid['amount'] * 0.01;
        $valid['calculated_hst'] = $hst_rate * $valid['amount'] * 0.01;
        $valid['calculated_qst'] = $qst_rate * $valid['amount'] * 0.01;
        $valid['total_amount'] = $valid['calculated_gst'] +
                                 $valid['calculated_pst'] +
                                 $valid['calculated_hst'] +
                                 $valid['calculated_qst'] +
                                 $valid['amount'];
        $valid['order_status']  = 1;

        Order::create($valid);

        return view('parents.success_order')->withSuccess('Order Submitted. Thank you');
    }

    public function temp()
    {
        return view('parents.temp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    /**
     * Shows tha form to submit a new order
     * 
     * @param Vois
     * @return view showing the form
     */
    public function showOrder()
    {

        $parent_id = 1;

        $students = DB::table('students')->where('idparent','=',$parent_id)->get()->toArray();

        $all_events = [];
        $all_orders = [];
        $schools_info =[];

        $current_date = date('Y-m-d');

        $final_table = [];
        
        foreach($students as $student){

            // Get all upcoming events for the current school
            $events = DB::table('events')->where('idschool','=',$student->idschool)
                                            ->where('is_active','=','1')
                                            ->where('cutoff_date','>=',$current_date)
                                            ->get()->toArray();
            $all_events[] = $events;
            
            
            $classroom = DB::table('classrooms')->where('idclassroom','=',$student->idclassroom)->first();
            $school = DB::table('schools')->where('idschool','=',$student->idschool)->first();

            $row_school['classroom'] = $classroom->classroom . ' , ' . $classroom->description;
            $row_school['school'] =  $school->school_name . '(Id: ' . $school->idschool . ' )';
            // Get all the submitted orders from the current student in the upcoming events
            $orders = DB::table('orders')->where('idstudent','=',$student->idstudent)->get()->toArray();
            
            
            // Summary - To be shown in the table in orders.php
            $orders_student = [];


            // Checks if the upcoming order is already submitted
            foreach($events as $event){
                $row = [];

                $row['event_date'] = $event->event_date;
                $row['status'] = 'Pendient';
                $row['total_amount'] = '---';
                $row['order'] = '---';
                $row['action']= '';
                $row['idevent'] = $event->idevent;
                $row['idstudent'] = $student->idstudent;
                

                $submitted = false;

                foreach($orders as $order){
                    if($event->idevent == $order->idevent){
                        $row['status'] = 'Submitted';
                        $row['total_amount'] = $order->total_amount;
                        $row['order'] = $order->idorder;
                        $row['action'] = 'show';
                        $row['idorder'] = $order->idorder;
                    }
                }

                $orders_student[] = $row;
            }

            $all_orders[] = $orders_student;
            $schools_info[] = $row_school;

            
        }
        
        
        $data = [
            'students' => $students,
            'all_events' => $all_orders,
            'schools_info' =>$schools_info
        ];

        return view('parents.order', compact('data'));
    }

    public function newOrder(Event $event, Student $student)
    {

        $school = DB::table('schools')->where('idschool','=',$event->idschool)->first();
        $items = DB::table('event_items')->where('idevent','=',$event->idevent)->get();
        $item_description = [];
        
        foreach ($items as $item)
        {
            $item_description[] = DB::table('menu_items')->where('iditem','=', $item->iditem)->first(['item_name']);
        }



        $data = [
            'event' => $event,
            'school' => $school,
            'items' => $items,
            'student' =>$student,
            'item_description' => $item_description
        ];
        return view('parents.neworder', compact('data'));
    }

    public function checkout(Request $request)
    {   
        $input = $request->all();
        $order =[];

        $idevent = $request->input('idevent');
        $idstudent = $request->input('idstudent');
        
        $event  = DB::table('events')->where('idevent','=',$idevent)->first();
        $school = DB::table('schools')->where('idschool','=',$event->idschool)->first();
        $student = DB::table('students')->where('idstudent','=',$idstudent)->first();

        foreach($input as $field=>$value )
        {
            if(strpos($field, 'qty') !== false)
            {

                $iditem = str_replace("qty","",$field);
                $final_price= DB::table('event_items')->where('idevent','=',$idevent)->where('iditem','=',$iditem)->first()->final_price;
                $row = [
                    'iditem' => $iditem,
                    'item_name' => DB::table('menu_items')->where('iditem','=', $iditem)->first(['item_name']),
                    'final_price' => $final_price,
                    'qty' => $value
                ];
                $order[] = $row;
            }
        }
        

        $data = [
            'order' => $order,
            'student' => $student,
            'school' => $school,
            'idevent' => $idevent
        ];

        /*
        echo '<pre>';
        var_dump($data);die;
        echo '</pre>';*/

        return view('parents.checkout', compact('data'));
    }
}
