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

        $super = [
            'branch_id' => '1',
            'name' => 'Peerapat',
            'surname' => 'Chommanee',
            'password' => '123456',
            'email' => 'Peerapat@cmu.ac.th',
            'phone_number' => '0882281932',
            'role_id' => '3',
            'image_id' => '12356468402435.png'
        ];
        DB::table('users')->insert($super);

        $super = [
            'branch_id' => '1',
            'name' => 'patima',
            'surname' => 'samranpong',
            'password' => "123456",
            'email' => 'Patima@cmu.ac.th',
            'phone_number' => '0882281932',
            'role_id' => '3',
            'image_id' => '12356468402435.png'
        ];
        DB::table('users')->insert($super);

        $super = [
            'branch_id' => '1',
            'name' => 'Teerapong',
            'surname' => 'Boonmak',
            'password' => "123456",
            'email' => 'Teerapong@cmu.ac.th',
            'phone_number' => '0882281932',
            'role_id' => '3',
            'image_id' => '12356468402435.png'
        ];
        DB::table('users')->insert($super);
        $super = [
            'branch_id' => '1',
            'name' => 'Auttapon',
            'surname' => 'Natajinda',
            'password' => "123456",
            'email' => 'Auttapon@cmu.ac.th',
            'phone_number' => '0882281932',
            'role_id' => '3',
            'image_id' => '12356468402435.png'
        ];
        DB::table('users')->insert($super);
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
