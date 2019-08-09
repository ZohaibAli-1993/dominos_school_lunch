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
        //
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

        $students = Student::all();

        $all_events = [];
        $all_orders = [];
        
        
        foreach($students as $student){
            $events = DB::table('events_vw')->where('idschool','=',$student->idschool)->get();
            $all_events[] = $events;

            $orders = DB::table('orders')->where('idstudent','=',$student->idstudent)->get();
            $all_orders = $orders;
        }

        $data = [
            'students' => $students,
            'all_events' => $all_events,
            'all_orders' => $all_orders
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

        foreach($input as $field=>$value )
        {
            if(strpos($field, 'qty') !== false)
            {

                $iditem = str_replace("qty","",$field);
                $final_price= DB::table('event_items')->where('idevent','=',$idevent)->where('iditem','=',$iditem)->get();
                $row = [
                    'iditem' => $iditem,
                    'item_name' => DB::table('menu_items')->where('iditem','=', $iditem)->first(['item_name']),
                    'final_price' => $final_price,
                    'qty' => $value
                ];
                $order[] = $row;
            }
        }
        

        //var_dump($order);die;

        return view('parents.checkout', compact('order'));
    }
}
