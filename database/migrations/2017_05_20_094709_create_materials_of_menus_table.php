<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsOfMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_of_menus', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('menu_id')->foreign()
                ->references('id')->on('menus')
                ->onDelete('cascade');
            $table->integer('material_id')->foreign()
                ->references('id')->on('materials')
                ->onDelete('cascade');
            $table->integer('type_id')->foreign()
                ->references('id')->on('material_types');
            $table->integer('quantity');

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
        Schema::dropIfExists('materials_of_menus');
    }
}
