<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_subscriptions_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'email' =>'example@email.com', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
         ]);   
        DB::table('subscriptions')->insert([
            'email' =>'email@email.com', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()            
         ]);           
    }
}
