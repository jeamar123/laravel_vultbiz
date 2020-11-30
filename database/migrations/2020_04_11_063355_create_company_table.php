<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('email');
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('photo')->default('../assets/img/male.png');
            $table->string('nature_of_business')->nullable();
            $table->integer('activated')->default(0);
            $table->string('token')->nullable();
            $table->timestamps();
        });

        DB::table('company')->insert([
            'company_name' => 'Sample Company',
            'email' => 'company123@gmail.com',
            'password' => md5('company123'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
