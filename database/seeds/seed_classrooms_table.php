<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_classrooms_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM 11', 
            'description' => 'Grade 01 - 001', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM 12', 
            'description' => 'Grade 02 - 002', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   

        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM 13', 
            'description' => 'Grade 03 - 003', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   

        DB::table('classrooms')->insert([
            'idschool' => 2, 
            'classroom' => 'ROOM 21', 
            'description' => 'Grade 01 - 0021', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('classrooms')->insert([
            'idschool' => 2, 
            'classroom' => 'ROOM 22', 
            'description' => 'Grade 02 - 0022', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   

        DB::table('classrooms')->insert([
            'idschool' => 2, 
            'classroom' => 'ROOM 23', 
            'description' => 'Grade 03 - 0023', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);          
    }
}


