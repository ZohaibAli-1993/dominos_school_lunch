<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_orders_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 1, 
            'idschool' => 1, 
            'idclassroom' => 1,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 8, 
            'idschool' => 1, 
            'idclassroom' => 1,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 10, 
            'idschool' => 1, 
            'idclassroom' => 1,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 3, 
            'idschool' => 1, 
            'idclassroom' => 2,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 4, 
            'idschool' => 1, 
            'idclassroom' => 2,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 9, 
            'idschool' => 1, 
            'idclassroom' => 2,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 12, 
            'idschool' => 1, 
            'idclassroom' => 2,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 5, 
            'idschool' => 1, 
            'idclassroom' => 3,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 14, 
            'idschool' => 1, 
            'idclassroom' => 3,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 6, 
            'idschool' => 1, 
            'idclassroom' => 4,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 7, 
            'idschool' => 1, 
            'idclassroom' => 4,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 13, 
            'idschool' => 1, 
            'idclassroom' => 6,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
        DB::table('orders')->insert([
            'idevent' => 1, 
            'idstudent' => 2, 
            'idschool' => 1, 
            'idclassroom' => 6,
            'amount' => 10.00,
            'calculated_gst' => 0.50,
            'calculated_pst' => 0.7,            
            'calculated_hst' => 0, 
            'calculated_qst' => 0, 
            'total_amount' => 11.20,
            'order_status' => 'C',            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                                         
    }
}
