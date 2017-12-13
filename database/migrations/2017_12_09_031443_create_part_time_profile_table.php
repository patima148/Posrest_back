<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartTimeProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_time_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id')->foreign()
                ->references('id')->on('branches')
                ->onDelete('cascade');
            $table->unsignedInteger('user_id')->foreign()
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->float('average_time_per_cup')->default(0.00);
            $table->float('average_pause_time')->default(0.00);
            $table->integer('average_cup_per_day')->default(0.00);
            $table->float('correctness')->default(0.00);
            $table->float('late')->default(0.00);
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
        Schema::dropIfExists('part_time_profile');
    }
}
