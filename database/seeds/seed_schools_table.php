<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_schools_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'school_name' => 'Maples Collegiate', 
            'address' => '496 Portage Ave',
            'city' => 'Winnipeg',
            'province' => 'MB',
            'postal_code' => 'R4R4R4',
            'phone' => '(204)999-9999',
            'coordinator_first_name' => 'Mary',
            'coordinator_last_name' => 'Jane',
            'email' => 'school1@email.com',
            'password' => bcrypt("12345678"),
            'token' => 'MCOL001',
            'markup' => 30,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('schools')->insert([
            'school_name' => 'Hugh John MacDonald School', 
            'address' => '496 Portage Ave',
            'city' => 'Winnipeg',
            'province' => 'MB',
            'postal_code' => 'R4R4R4',
            'phone' => '(204)999-9999',
            'coordinator_first_name' => 'John',
            'coordinator_last_name' => 'River',
            'email' => 'school2@email.com',
            'password' => bcrypt("12345678"),
            'token' => 'HGMS001',
            'markup' => 20,
            'is_active' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
