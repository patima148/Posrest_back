<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function(Blueprint $table){
        $table->increments('id');
        $table->string('name');
        $table->unsignedInteger('image_id')->foreign()
                ->references('id')->on('images')
                ->onDelete('cascade')->default("0");
            $table->unsignedInteger('branch_id')->foreign()
                ->references('id')->on('branches')
                ->onDelete('cascade');

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
    }
}


