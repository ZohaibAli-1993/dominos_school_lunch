<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_users_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Maples Collegiate', 
            'email' => 'school1@email.com',
            'type' =>'school', 
            'password' =>bcrypt("12345678"),
            'idschool' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('users')->insert([
            'name' =>'Hugh John MacDonald School', 
            'email' => 'school2@email.com',
            'type' =>'school', 
            'password' =>bcrypt("12345678"),
            'idschool' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        DB::table('users')->insert([
            'name' =>'Admin User', 
            'email' => 'admin@admin.com',
            'type' =>'admin', 
            'password' =>bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);        


        DB::table('users')->insert([
            'name' =>'Diana Robert', 
            'email' => 'diana@email.com',
            'type' =>'parents',
            'idparent' => 1,
            'password' =>bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' =>'Any Parent', 
            'email' => 'parent@example.com',
            'type' =>'parents',
            'idparent' => 3,
            'password' =>bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' =>'Katrina Regina', 
            'email' => 'katrina@email.com',
            'type' =>'parents',
            'idparent' => 2,
            'password' =>bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);



    }
}
