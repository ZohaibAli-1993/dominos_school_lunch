<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('parents_register', function (Blueprint $table) {
=======
        Schema::create('parents', function (Blueprint $table) {
>>>>>>> Daphne
            $table->bigIncrements('idparent');
            $table->string('first_name',30); 
            $table->string('last_name',30); 
            $table->string('email',255); 
            $table->string('phone',15); 
            $table->string('password',255); 
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
<<<<<<< HEAD
        Schema::dropIfExists('parents_register');
=======
        Schema::dropIfExists('parents');
>>>>>>> Daphne
    }
}
