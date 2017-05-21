<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuHasImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_has__images', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('image_id')->foreign()
                ->references('id')->on('images');
            $table->integer('menu_id')->foreign()
                ->references('id')->on('menus');

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
        Schema::dropIfExists('menu_has__images');
    }
}
