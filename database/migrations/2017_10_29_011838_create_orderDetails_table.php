<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->foreign()
                ->references('id')->on('order');
            $table->unsignedInteger('menu_id')->foreign()
                ->references('id')->on('menu');
            $table->string('status')->default("ordering");
            $table->string('sweetness');
            $table->timestamps();
        });
        $super = [
            'order_id' => '1',
            'menu_id' => '1',
            'status' => 'done',
            'sweetness' => 'normal',
            "created_at" =>  '2017-12-5 19:54:59',
            "updated_at" =>  '2017-12-5 19:54:59'
        ];
        DB::table('order_details')->insert($super);

        $super = [
            'order_id' => '1',
            'menu_id' => '1',
            'status' => 'done',
            'sweetness' => 'high',
            "created_at" =>  '2017-12-5 19:54:59',
            "updated_at" =>  '2017-12-5 19:54:59'
        ];
        DB::table('order_details')->insert($super);

        $super = [
            'order_id' => '2',
            'menu_id' => '1',
            'status' => 'ordering',
            'sweetness' => 'high',
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" =>  \Carbon\Carbon::now()
        ];
        DB::table('order_details')->insert($super);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
