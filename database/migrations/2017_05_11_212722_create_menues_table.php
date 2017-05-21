<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->double('sell_price',5,2);
            /*$table->integer('material_id')->foreign()
                ->references('id')->on('id')
                ->onDelete('cascade');*/
            $table->integer('menu_type_id')->foreign()
                ->references('id')->on('menu_types');



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
        Schema::dropIfExists('menus');
        //
    }
}
