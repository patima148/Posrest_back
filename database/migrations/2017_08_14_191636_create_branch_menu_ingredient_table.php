<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchMenuIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_menu_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('menu_id')->foreign()
                ->references('id')->on('branch_menu')
                ->onDelete('cascade');
            $table->unsignedInteger('ingredient_id')->foreign()
                ->references('id')->on('branch_ingredient')
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
        Schema::dropIfExists('branch_menu_ingredient');
    }
}
