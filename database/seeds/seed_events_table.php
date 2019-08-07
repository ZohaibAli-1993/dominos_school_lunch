<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_events_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'idschool' => 1, 
            'event_name' => 'Fundraiser lunch 001', 
            'event_date' => Carbon::parse('2019-09-10'), 
            'cutoff_date' => Carbon::parse('2019-09-05'),
            'event_time' => Carbon::createFromTimeString('12:00:00'), 
            'is_active' => true, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  

        DB::table('events')->insert([
            'idschool' => 2, 
            'event_name' => 'Fundraiser lunch 002', 
            'event_date' => Carbon::parse('2019-09-20'), 
            'cutoff_date' => Carbon::parse('2019-09-15'),
            'event_time' => Carbon::createFromTimeString('12:00:00'), 
            'is_active' => true, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  

        DB::table('events')->insert([
            'idschool' => 2, 
            'event_name' => 'Lunch 003', 
            'event_date' => Carbon::parse('2019-09-21'), 
            'cutoff_date' => Carbon::parse('2019-09-12'),
            'event_time' => Carbon::createFromTimeString('13:00:00'), 
            'is_active' => true, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  

        DB::table('events')->insert([
            'idschool' => 2, 
            'event_name' => 'Lunch 004', 
            'event_date' => Carbon::parse('2019-09-21'), 
            'cutoff_date' => Carbon::parse('2019-09-12'),
            'event_time' => Carbon::createFromTimeString('15:00:00'), 
            'is_active' => true, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);          

    }
}

