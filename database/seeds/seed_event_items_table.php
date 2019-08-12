<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_event_items_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_items')->insert([
            'idevent' => 1, 
            'iditem' => 1, 
            'final_price' => 5, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('event_items')->insert([
            'idevent' => 1, 
            'iditem' => 2, 
            'final_price' => 6, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
         DB::table('event_items')->insert([
            'idevent' =>2, 
            'iditem' => 3, 
            'final_price' => 13, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('event_items')->insert([
            'idevent' => 2, 
            'iditem' => 4, 
            'final_price' => 14, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
    }
}
