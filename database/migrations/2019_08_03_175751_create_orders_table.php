<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('idorder');
            $table->integer('idevent');
            $table->integer('idstudent');
            $table->integer('idschool');
            $table->integer('idclassroom');
            $table->decimal('amount',7,2);
            $table->decimal('calculated_gst',7,2);
            $table->decimal('calculated_pst',7,2);
            $table->decimal('calculated_hst',7,2);
            $table->decimal('calculated_qst',7,2);
            $table->decimal('total_amount',7,2);
            $table->string('order_status',1);
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
        Schema::dropIfExists('orders');
    }
}
