<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_categories_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Slice', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('categories')->insert([
            'category' => 'Small(10")', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);    

        DB::table('categories')->insert([
            'category' => 'Medium(12")', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);  

        DB::table('categories')->insert([
            'category' => 'Large(14")', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);      
        DB::table('categories')->insert([
            'category' => 'X-Large(16")', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
    }
}
