<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('idTaiKhoang',100); 
            $table->string('username',100); 
            $table->string('email',100);
            $table->string('phone',400);
            $table->string('status',100)->defautl('member');
            $table->string('avata',400);
            $table->string('address',400);
            $table->string('password',1000);

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
