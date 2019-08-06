<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_provinces_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            'province' =>'AB', 
            'province_name' =>'Alberta',
            'gst_rate' =>5, 
            'pst_rate' =>0,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'BC', 
            'province_name' =>'British Columbia',
            'gst_rate' =>5, 
            'pst_rate' =>7,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'MB', 
            'province_name' =>'Manitoba',
            'gst_rate' =>5, 
            'pst_rate' =>7,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'NB', 
            'province_name' =>'New Brunswick',
            'gst_rate' =>0, 
            'pst_rate' =>0,
            'hst_rate' =>15, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'NL', 
            'province_name' =>'Newfoundland and Labrador',
            'gst_rate' =>0, 
            'pst_rate' =>0,
            'hst_rate' =>15, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    
        DB::table('provinces')->insert([
            'province' =>'NT', 
            'province_name' =>'Northwest Territories',
            'gst_rate' =>5, 
            'pst_rate' =>0,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'NS', 
            'province_name' =>'Nova Scotia',
            'gst_rate' =>0, 
            'pst_rate' =>0,
            'hst_rate' =>15, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'NU', 
            'province_name' =>'Nunavut',
            'gst_rate' =>5, 
            'pst_rate' =>0,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'ON', 
            'province_name' =>'Ontario',
            'gst_rate' =>0, 
            'pst_rate' =>0,
            'hst_rate' =>13, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  
        DB::table('provinces')->insert([
            'province' =>'PE', 
            'province_name' =>'Prince Edward Island',
            'gst_rate' =>0, 
            'pst_rate' =>0,
            'hst_rate' =>15, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'QC', 
            'province_name' =>'Quebec',
            'gst_rate' =>5, 
            'pst_rate' =>0,
            'hst_rate' =>0, 
            'qst_rate' =>9.975,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'SK', 
            'province_name' =>'Saskatchewan',
            'gst_rate' =>5, 
            'pst_rate' =>6,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
        DB::table('provinces')->insert([
            'province' =>'YT', 
            'province_name' =>'Yukon',
            'gst_rate' =>5, 
            'pst_rate' =>0,
            'hst_rate' =>0, 
            'qst_rate' =>0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                                       
    }
}
