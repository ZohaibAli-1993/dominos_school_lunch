<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_contacts_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => 'Eliah Jones', 
            'email' => 'ejones@email.com', 
            'subject' => 'Information', 
            'message' => 'I would like to receive information about the program',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
    }
}

