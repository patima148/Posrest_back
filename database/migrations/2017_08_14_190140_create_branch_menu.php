<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id')->foreign()
                ->references('id')->on('branches')
                ->onDelete('cascade');
            $table->unsignedInteger('menu_id')->foreign()
                ->references('id')->on('menus')
                ->onDelete('cascade');
            $table->string('type')->default("Brewing");
            $table->string('grade')->default("Normal");
            $table->decimal('price')->default("0.00");
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
        Schema::dropIfExists('branch_menus');
    }
}
