<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrewingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brewing', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('order_details_id')->foreign()
                ->references('id')->on('order_details');
            //$table->integer('menu_id')->foreign()
            //   ->references('menu_id')->on('orders');


            $table->float('brewing_time');
            $table->float('stop_time');


            $table->integer('barista_id')->foreign()
                ->references('id')->on('user');

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
        Schema::dropIfExists('brewing');
    }
}
