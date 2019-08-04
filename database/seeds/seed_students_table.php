<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_students_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'idparent' =>1, 
            'first_name' => 'Tony',
            'last_name' => 'Albert',
            'idschool' =>1, 
            'idclassroom' =>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>1, 
            'first_name' => 'Robert',
            'last_name' => 'Underhill',
            'idschool' =>2, 
            'idclassroom' =>4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);       
        DB::table('students')->insert([
            'idparent' =>2, 
            'first_name' => 'Ashley',
            'last_name' => 'Moon',
            'idschool' =>1, 
            'idclassroom' =>2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);             
    }
}

