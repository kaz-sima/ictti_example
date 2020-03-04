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
            $table->string('organization')->nullable();
            $table->string('course')->nullable();            
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('nrc')->nullable();
            $table->string('email')->nullable()->unique(); // for socilite
            //$table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60)->nullable();
            $table->string('phone')->nullable();
            $table->string("address")->nullable();
            $table->string('provider'); // add for socialite
            $table->string('provider_id'); // add for socialite
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
