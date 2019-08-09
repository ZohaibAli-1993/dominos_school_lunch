<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_calendars_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calendars')->insert([
            'school_year' => '2019/2020', 
            'begin_dt' => Carbon::parse('2019-09-01'), 
            'end_dt' => Carbon::parse('2020-06-30'), 
            'is_active' => true, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
