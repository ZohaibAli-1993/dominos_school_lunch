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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('users')->insert([
            'name' =>'Hugh John MacDonald School', 
            'email' => 'school2@email.com',
            'type' =>'school', 
            'password' =>bcrypt("12345678"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
