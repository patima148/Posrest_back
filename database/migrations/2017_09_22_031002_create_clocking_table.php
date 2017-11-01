<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clockings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id')->foreign()
                ->references('id')->on('branches');
            $table->unsignedInteger('user_id')->foreign()
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('clockIn_id')->foreign()
                ->references('id')->on('clockIn');
            $table->unsignedInteger('clockOut_id')->foreign()
                ->references('id')->on('clockOut');
            $table->float('workingDuration_Min')->nullable();
            $table->float('totalDuration_Hour')->nullable();
            $table->float('payRate');
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
        Schema::dropIfExists('clockings');
    }
}
