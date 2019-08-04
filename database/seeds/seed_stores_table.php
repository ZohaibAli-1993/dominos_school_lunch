<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_stores_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('stores')->insert([
			'name'=>'Portage Ave',
			'address'=>'980A Portage',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5550', 
			'email'=>'dominosportage@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Pembina',
			'address'=>'2870 Pembina',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987--5551', 
			'email'=>'dominospembina@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'McPhillips',
			'address'=>'3-1353 McPhillips St',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5552', 
			'email'=>'dominosmcphillips@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Lakewood',
			'address'=>'160-50 Lakewood Blvd',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5553', 
			'email'=>'dominoslakewood@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Springfield',
			'address'=>'7-686 Springfield Rd',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5554', 
			'email'=>'dominosspringfield@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Bridgwater',
			'address'=>'310-400 North Town Rd',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5597', 
			'email'=>'dominosbridgewater@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Portage West',
			'address'=>'3059 Portage Ave',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5555', 
			'email'=>'dominosportagewest@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Corydon',
			'address'=>'1683 Corydon',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5556', 
			'email'=>'dominoscorydon@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Regent',
			'address'=>'1-233 Regent Ave W',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5557', 
			'email'=>'dominosregent@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Meadowood',
			'address'=>'100-166 Meadowood Dr',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5559', 
			'email'=>'dominosmeadowood@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Osborne',
			'address'=>'468 Osborne St',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 615-5559', 
			'email'=>'dominososborne@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Main',
			'address'=>'8-1965 Main St',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5598', 
			'email'=>'dominosmain@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Marion',
			'address'=>'B-231 Marion St',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5599', 
			'email'=>'dominosmarion@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 
		DB::table('stores')->insert([
			'name'=>'Waterford',
			'address'=>'55 Waterford Green',
			'city'=>'Winnipeg',
			'province'=>'MB',
			'postal_code'=>'R9R9R9',
			'phone'=>'204 987-5596', 
			'email'=>'dominos-waterford@dpz.ca',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]); 

    }
}
