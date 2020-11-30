<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('contact_number')->nullable();
            $table->string('photo')->default('../assets/img/male.png');
            $table->integer('access_level')->default(0);
            $table->timestamps();
        });

        DB::table('admin')->insert([
            'name' => 'Jeamar Libres',
            'email' => 'jeamar1234@gmail.com',
            'password' => md5('jeamar123'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
