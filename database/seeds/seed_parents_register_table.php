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

        DB::table('parents')->insert([
            'first_name' => 'Diana', 
            'last_name' => 'Robert', 
            'email' => 'diana@email.com', 
            'phone' => '(204)888-8888',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  

        DB::table('parents')->insert([
            'first_name' => 'Katrina', 
            'last_name' => 'Regina', 
            'email' => 'katrina@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('parents')->insert([
            'first_name' => 'Parent 003', 
            'last_name' => 'Last 003', 
            'email' => 'parent003@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('parents')->insert([
            'first_name' => 'Parent 004', 
            'last_name' => 'Last 004', 
            'email' => 'parent004@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
        DB::table('parents')->insert([
            'first_name' => 'Parent 005', 
            'last_name' => 'Last 005', 
            'email' => 'parent005@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('parents')->insert([
            'first_name' => 'Parent006', 
            'last_name' => 'Robert', 
            'email' => 'diana@email.com', 
            'phone' => '(204)888-8888',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  

        DB::table('parents')->insert([
            'first_name' => 'Parent007', 
            'last_name' => 'Regina', 
            'email' => 'katrina@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('parents')->insert([
            'first_name' => 'Parent 008', 
            'last_name' => 'Last 008', 
            'email' => 'parent008@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('parents')->insert([
            'first_name' => 'Parent 009', 
            'last_name' => 'Last 009', 
            'email' => 'parent009@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
        DB::table('parents')->insert([
            'first_name' => 'Parent 010', 
            'last_name' => 'Last 010', 
            'email' => 'parent010@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('parents')->insert([
            'first_name' => 'Parent 011', 
            'last_name' => 'Last 011', 
            'email' => 'parent011@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                      

        DB::table('parents')->insert([
            'first_name' => 'Parent 012', 
            'last_name' => 'Last 012', 
            'email' => 'parent011@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                      


        DB::table('parents')->insert([
            'first_name' => 'Parent 013', 
            'last_name' => 'Last 013', 
            'email' => 'parent011@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                      


        DB::table('parents')->insert([
            'first_name' => 'Parent 014', 
            'last_name' => 'Last 014', 
            'email' => 'parent011@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                      
    
        DB::table('parents')->insert([
            'first_name' => 'Parent 015', 
            'last_name' => 'Last 015', 
            'email' => 'parent011@email.com', 
            'phone' => '(204)777-7777',
            'password' => bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                      
    }

}
