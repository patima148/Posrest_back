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

        $super = [

            'branch_id' => '1',
            'user_id' => '1',
            'average_time_per_cup' => '5',
            'average_pause_time' => '2',
            'average_cup_per_day' => '10',
            'correctness' => '10',
            'late' => '0'
        ];
        DB::table('part_time_profile')->insert($super);

        $super = [

        'branch_id' => '1',
        'user_id' => '2',
        'average_time_per_cup' => '7',
        'average_pause_time' => '1',
        'average_cup_per_day' => '8',
        'correctness' => '10',
        'late' => '0'
        ];
        DB::table('part_time_profile')->insert($super);

        $super = [

            'branch_id' => '1',
            'user_id' => '3',
            'average_time_per_cup' => '9',
            'average_pause_time' => '2',
            'average_cup_per_day' => '5',
            'correctness' => '10',
            'late' => '0'
        ];
        DB::table('part_time_profile')->insert($super);

        $super = [

            'branch_id' => '1',
            'user_id' => '4',
            'average_time_per_cup' => '6',
            'average_pause_time' => '1',
            'average_cup_per_day' => '11',
            'correctness' => '10',
            'late' => '0'
        ];
        DB::table('part_time_profile')->insert($super);

        $super = [

            'branch_id' => '1',
            'user_id' => '5',
            'average_time_per_cup' => '12',
            'average_pause_time' => '3',
            'average_cup_per_day' => '4',
            'correctness' => '10',
            'late' => '0'
        ];
        DB::table('part_time_profile')->insert($super);
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
