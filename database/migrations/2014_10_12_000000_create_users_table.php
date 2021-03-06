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
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('photo')->default('../assets/img/male.png');
            $table->integer('activated')->default(0);
            $table->string('token')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Sample User',
            'email' => 'user123@gmail.com',
            'password' => md5('user123'),
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
