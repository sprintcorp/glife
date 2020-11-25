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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('matric_no')->unique();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_password');
            $table->integer('isAdmin')->default(0);
            $table->string('faculty')->nullable();
            $table->string('department')->nullable();
            $table->string('programme')->nullable();
            $table->integer('level')->nullable();
            $table->string('designation')->nullable();
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