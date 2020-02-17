<?php

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('user_type');
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('photo')->default('../assets/img/male.png');
            $table->string('nature_of_business')->nullable();
            $table->integer('activated')->default(0);
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Jeamar Libres',
            'email' => 'jeamar1234@gmail.com',
            'password' => md5('jeamar123'),
            'user_type' => 0
        ]);
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
