<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class seed_menu_items_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insert([
            'item_name' => 'Cheese Pizza', 
            'description' => 'Big Slice Cheese Pizza', 
            'price' => 3.00, 
            'nutrition_facts' => 'Calories 100',
            'idcategory' => 1, 
            'image' => '/img/pizza_mix.jpg', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('menu_items')->insert([
            'item_name' => 'Peperoni Pizza', 
            'description' => 'Big Slice Pepperoni Pizza', 
            'price' => 3.00, 
            'nutrition_facts' => 'Calories 100',
            'idcategory' => 1, 
            'image' => '/img/pizza_pepperoni.jpg', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);     
        DB::table('menu_items')->insert([
            'item_name' => 'Cheese Pizza', 
            'description' => 'Small Cheese Pizza', 
            'price' => 10.00, 
            'nutrition_facts' => 'Calories 500',
            'idcategory' => 2, 
            'image' => '/img/pizza_mix.jpg', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('menu_items')->insert([
            'item_name' => 'Peperoni Pizza', 
            'description' => 'Small Pepperoni Pizza', 
            'price' => 10.00, 
            'nutrition_facts' => 'Calories 500',
            'idcategory' => 2, 
            'image' => '/img/pizza_pepperoni.jpg', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('menu_items')->insert([
            'item_name' => 'Cheese Pizza', 
            'description' => 'Medium Cheese Pizza', 
            'price' => 15.00, 
            'nutrition_facts' => 'Calories 800',
            'idcategory' => 3, 
            'image' => '/img/pizza_mix.jpg', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);   
        DB::table('menu_items')->insert([
            'item_name' => 'Peperoni Pizza', 
            'description' => 'Medium Pepperoni Pizza', 
            'price' => 15.00, 
            'nutrition_facts' => 'Calories 800',
            'idcategory' => 3, 
            'image' => '/img/pizza_pepperoni.jpg', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);                    
    }
}

