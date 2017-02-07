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
            //$table->increments('id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->primary('uuid');
            $table->timestamps();

        });

//        DB::statement('ALTER TABLE users ADD uuid BINARY(16) NOT NULL AFTER id;');
//        DB::statement('CREATE UNIQUE INDEX users_uuid_unique ON users (uuid);');
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
