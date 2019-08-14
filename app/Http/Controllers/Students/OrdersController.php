<?php

namespace App\Http\Controllers\Students;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Event;
use Illuminate\Support\Facades\DB;
use Auth;


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
        $valid['order_status']  = 'C';

        $idorder = Order::create($valid)->idorder;
        $id_items = $all_inputs['item'];
        $qty_items = $all_inputs['qty'];
        $price = [];
        $subtotal = [];
        
        for ($i=0; $i < count($id_items); $i++){
            $price[] = DB::table('event_items')->where('idevent','=',$all_inputs['idevent'])->where('iditem','=',$id_items[$i])->first()->final_price;
            $subtotal[] = number_format($qty_items[$i] * $price[$i], 2);


            $item = [
                'idorder' => $idorder,
                'iditem' => $id_items[$i],
                'item_price' => $price[$i],
                'quantity' => $qty_items[$i],
                'sub_total' => $subtotal[$i]
            ];

            if(!is_numeric($item['quantity'])){
                $item['quantity'] = 0;
                $item['sub_total'] = 0;
            }elseif($item['quantity']<0){
                $item['quantity'] = 0;
                $item['sub_total'] = 0;
            }

            OrderItem::create($item);
        }

        

        //$this.showInvoice($all_inputs['idevent'],$all_inputs['idstudent']);
        header("Location: parents/order");
        //return view('parents.order')->withSuccess('Order Submitted. Thank you');
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
        $parent_id = Auth::user()->idparent;
        $name = DB::table('users')->where('id','=',$parent_id)->first()->name;

        

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
            'schools_info' =>$schools_info,
            'parent_name' => $name
        ];

        return view('parents.order', compact('data'));
    }

    /**
     * Show past orders for current parent
     */
    public function showOrderPast()
    {

        $parent_id = Auth::user()->id;
        $name = DB::table('users')->where('id','=',$parent_id)->first()->name;

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
                                            ->where('cutoff_date','<',$current_date)
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
            'schools_info' =>$schools_info,
            'parent_name' => $name
        ];

        return view('parents.order_past', compact('data'));
    }

    public function newOrder(Event $event, Student $student)
    {

        $school = DB::table('schools')->where('idschool','=',$event->idschool)->first();
        $province = DB::table('provinces')->where('province','=',$school->province)->first();
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
            'item_description' => $item_description,
            'province' => $province
        ];

        return view('parents.neworder', compact('data'));
    }

    public function showInvoice(Event $event, Student $student)
    {

        $parent_id = Auth::user()->id;
        $name = DB::table('users')->where('id','=',$parent_id)->first()->name;
        $students_parent = DB::table('students')->where('idparent','=',$parent_id)->get();

        $exist = false;

        foreach ($students_parent as $student_item){
            if($student->idstudent == $student_item->idstudent){
                $exist = true;
            }
        }

        if(!$exist){
            return view('/parents/order')->withErrors('Student not found');
        }

        $order = DB::table('orders')->where('idstudent','=',$student->idstudent)
                                    ->where('idevent','=',$event->idevent)->first();

        
        $items = DB::table('orders_items')->where('idorder','=',$order->idorder)->get();

        $item_description = [];
        
        foreach ($items as $item)
        {
            $item_description[] = DB::table('menu_items')->where('iditem','=', $item->iditem)->first(['item_name']);
        }



        $data = [
            'event' => $event,
            'items' => $items,
            'student' =>$student,
            'item_description' => $item_description,
            'order' => $order,
            'name' => $name
        ];
        /*
        echo '<pre>';
        var_dump($data['items']);die;
        echo '</pre>';
              */
        return view('parents.invoice', compact('data'));
    }

    public function checkout(Request $request)
    {   
        $input = $request->all();
        $order =[];

        $idevent = $request->input('idevent');
        $idstudent = $request->input('idstudent');
        
        $event  = DB::table('events')->where('idevent','=',$idevent)->first();
        $school = DB::table('schools')->where('idschool','=',$event->idschool)->first();
        $province = DB::table('provinces')->where('province','=',$school->province)->first();
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
            'idevent' => $idevent,
            'province' => $province
        ];

        /*
        echo '<pre>';
        var_dump($data);die;
        echo '</pre>';*/

        return view('parents.checkout', compact('data'));
    }
}
