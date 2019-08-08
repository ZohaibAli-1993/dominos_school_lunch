<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(seed_contacts_table::class);
        $this->call(seed_calendars_table::class);
        $this->call(seed_subscriptions_table::class);
        $this->call(seed_categories_table::class);
        $this->call(seed_schools_table::class);
        $this->call(seed_classrooms_table::class);
        $this->call(seed_provinces_table::class);
        $this->call(seed_setups_table::class);
        $this->call(seed_stores_table::class);
        $this->call(seed_events_table::class);
        $this->call(seed_event_items_table::class);
        $this->call(seed_parents_table::class);
        $this->call(seed_students_table::class);
        $this->call(seed_orders_table::class);
    }
}