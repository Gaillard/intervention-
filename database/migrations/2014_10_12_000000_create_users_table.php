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
            $table->char('CIN',12)->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('add',255);
            $table->date('date_naiss');
            $table->string('lieu_naiss');
            $table->string('genre',5);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('code');
            $table->string('role');
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
