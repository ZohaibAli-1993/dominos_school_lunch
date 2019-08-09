<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('idevent');
            $table->integer('idschool');
            $table->string('event_name',100);     
            $table->date('event_date');      
            $table->date('cutoff_date');  
            $table->time('event_time');     
<<<<<<< HEAD
            $table->boolean('is_active')->default(1);      
=======
            $table->boolean('is_active');      
>>>>>>> Daphne
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
