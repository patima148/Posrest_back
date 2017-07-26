<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        $super = [
            'name' => 'normal'
        ];
        DB::table('ingredient_types')->insert($super);

        $super = [
            'name' => 'high'
        ];
        DB::table('ingredient_types')->insert($super);

        $super = [
            'name' => 'premium'
        ];
        DB::table('ingredient_types')->insert($super);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_types');
    }
}
