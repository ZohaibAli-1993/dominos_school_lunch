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
            'classroom' => 'ROOM11', 
            'description' => 'Grade 01 - 001', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM12', 
            'description' => 'Grade 02 - 002', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   

        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM13', 
            'description' => 'Grade 03 - 003', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   

        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM14', 
            'description' => 'Grade 04 - 004', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);      

        DB::table('classrooms')->insert([
            'idschool' => 1, 
            'classroom' => 'ROOM15', 
            'description' => 'Grade 05 - 005', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);              

        DB::table('classrooms')->insert([
            'idschool' => 2, 
            'classroom' => 'ROOM21', 
            'description' => 'Grade 01 - 0021', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('classrooms')->insert([
            'idschool' => 2, 
            'classroom' => 'ROOM22', 
            'description' => 'Grade 02 - 0022', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   

        DB::table('classrooms')->insert([
            'idschool' => 2, 
            'classroom' => 'ROOM23', 
            'description' => 'Grade 03 - 0023', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);          
    }
}


