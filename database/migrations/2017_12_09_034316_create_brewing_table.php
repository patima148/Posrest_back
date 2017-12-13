<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrewingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brewings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_detail_id')->foreign()
                ->references('id')->on('order_details')
                ->onDelete('cascade');
            $table->unsignedInteger('user_id')->foreign()
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('status');
            $table->float('brewingDuration');
            $table->float('stoppingDuration');
            $table->timestamps();
        });
        $super = [
            'order_detail_id' => '1',
            'user_id' => '1',
            'status' => 'done',
            'brewingDuration' => '5.00',
            'stoppingDuration' => '2.00',
            "created_at" =>  '2017-12-5 19:54:59',
            "updated_at" =>  '2017-12-5 19:54:59'
        ];
        DB::table('brewings')->insert($super);

        $super = [
        'order_detail_id' => '2',
        'user_id' => '1',
        'status' => 'done',
        'brewingDuration' => '4.00',
        'stoppingDuration' => '0',
        "created_at" =>  '2017-12-5 19:54:59',
        "updated_at" =>  '2017-12-5 19:54:59'
    ];
        DB::table('brewings')->insert($super);

        $super = [
            'order_detail_id' => '3',
            'user_id' => '1',
            'status' => 'ordering',
            'brewingDuration' => '4.00',
            'stoppingDuration' => '0',
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" =>  \Carbon\Carbon::now()
        ];
        DB::table('brewings')->insert($super);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brewings');
    }
}
