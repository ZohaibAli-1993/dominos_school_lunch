<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_parents_register_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parents_register')->insert([
            'first_name' => 'Diana', 
            'last_name' => 'Robert', 
            'email' => 'diana@email.com', 
            'phone' => '(204)888-8888',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('parents_register')->insert([
            'first_name' => 'Katrina', 
            'last_name' => 'Regina', 
            'email' => 'katrina@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
    }
}
