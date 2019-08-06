<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('idschool');
            $table->string('school_name',150);
            $table->string('address',150);
            $table->string('city',50);
            $table->string('province',2);
            $table->string('postal_code',50);
            $table->string('phone',15);
            $table->string('coordinator_first_name',30);
            $table->string('coordinator_last_name',30);
            $table->string('email',255);
            $table->string('password',255);
            $table->integer('idstore');
            $table->string('token',8)->nullable();
            $table->string('markup',50)->nullable();
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('schools');
    }
}