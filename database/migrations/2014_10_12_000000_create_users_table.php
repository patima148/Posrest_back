<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('face_id');
            $table->unsignedInteger('role_id')->foreign()
                ->references('id')->on('roles')
                ->onDelete('cascade');
            $table->unsignedInteger('branch_id')->foreign()
                ->references('id')->on('branches')
                ->onDelete('cascade');
            $table->unsignedInteger('image_id')->foreign()
                ->references('id')->on('images')
                ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
