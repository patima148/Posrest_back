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
            $table->dateTime('clockIn_time');
            $table->dateTime('clockOut_time')->nullable()->default(null);
            $table->float('workingDuration_Min')->nullable()->default(null);
            $table->float('totalDuration_Hour')->nullable()->default(null);
            $table->float('payRate')->default("30.00");
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
