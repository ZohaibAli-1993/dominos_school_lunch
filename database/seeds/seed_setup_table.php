<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_setup_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setup')->insert([
            'store_max_events' =>2, 
            'markup_default' => 20,
            'cutoff_days' =>5, 
            'available_weekends' =>false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
    }
}


