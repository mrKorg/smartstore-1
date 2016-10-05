<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('activated')->default(0);
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('users');
    }
}
