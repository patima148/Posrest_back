<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->foreign()
                ->references('id')->on('images');
            $table->integer('branch_menu_id')->foreign()
                ->references('id')->on('branch_menu');
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
        Schema::dropIfExists('image_menu');
    }
}
