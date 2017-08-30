<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string("role_name");

            $table->timestamps();
        });
        $super = [
            'role_name' => 'Owner'
        ];
        DB::table('roles')->insert($super);

        $super = [
            'role_name' => 'Branch manager'
        ];
        DB::table('roles')->insert($super);

        $super = [
            'role_name' => 'part-time staff'
        ];
        DB::table('roles')->insert($super);

        $super = [
            'role_name' => 'Cashier'
        ];
        DB::table('roles')->insert($super);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()    {
        Schema::dropIfExists('roles');
    }
}
