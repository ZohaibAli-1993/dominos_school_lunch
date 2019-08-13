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
            'idclassroom' =>6,
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
        DB::table('students')->insert([
            'idparent' =>3, 
            'first_name' => 'Student0031',
            'last_name' => 'Last003',
            'idschool' =>1, 
            'idclassroom' =>2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>3, 
            'first_name' => 'Student0032',
            'last_name' => 'Last0032',
            'idschool' =>1, 
            'idclassroom' =>3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('students')->insert([
            'idparent' =>4, 
            'first_name' => 'Student0041',
            'last_name' => 'Last004',
            'idschool' =>1, 
            'idclassroom' =>4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>5, 
            'first_name' => 'Student0052',
            'last_name' => 'Last0052',
            'idschool' =>1, 
            'idclassroom' =>4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>7, 
            'first_name' => 'Student007',
            'last_name' => 'Last007',
            'idschool' =>1, 
            'idclassroom' =>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('students')->insert([
            'idparent' =>8, 
            'first_name' => 'Student008',
            'last_name' => 'Last008',
            'idschool' =>1, 
            'idclassroom' =>2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>9, 
            'first_name' => 'Student009',
            'last_name' => 'Last009',
            'idschool' =>1, 
            'idclassroom' =>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('students')->insert([
            'idparent' =>10, 
            'first_name' => 'Student10',
            'last_name' => 'Last10',
            'idschool' =>1, 
            'idclassroom' =>2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>11, 
            'first_name' => 'Student11',
            'last_name' => 'Last11',
            'idschool' =>1, 
            'idclassroom' =>2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>12, 
            'first_name' => 'Student12',
            'last_name' => 'Last12',
            'idschool' =>1, 
            'idclassroom' =>5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('students')->insert([
            'idparent' =>13, 
            'first_name' => 'Student13',
            'last_name' => 'Last13',
            'idschool' =>1, 
            'idclassroom' =>3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('students')->insert([
            'idparent' =>13, 
            'first_name' => 'Student14',
            'last_name' => 'Last014',
            'idschool' =>1, 
            'idclassroom' =>4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('students')->insert([
            'idparent' =>15, 
            'first_name' => 'Student15',
            'last_name' => 'Last015',
            'idschool' =>1, 
            'idclassroom' =>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                             
    }
}

