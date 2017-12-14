<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id')->foreign()
                ->references('id')->on('branches');
            $table->string('status');
            $table->float('price');
            $table->string('table');
            $table->integer('NumberOfMenu');
            $table->timestamps();
        });

        $super = [
            'id' => '2',
            'branch_id' => '1',
            'status' => 'ordering',
            'price' => '999',
            'table' => 'B',
            'NumberOfMenu' => '5',
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" =>  \Carbon\Carbon::now()
        ];
        DB::table('orders')->insert($super);

        $super = [
            'id' => '1',
            'branch_id' => '1',
            'status' => 'done',
            'price' => '999',
            'table' => 'A',
            'NumberOfMenu' => '2',
            "created_at" =>  '2017-12-5 19:54:59',
            "updated_at" =>  '2017-12-5 19:54:59'
        ];
        DB::table('orders')->insert($super);
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
