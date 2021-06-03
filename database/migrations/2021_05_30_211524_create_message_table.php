<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->text('mess');
            $table->char('cin_user',12);
            $table->bigInteger('demande_id')->unsingned();
            $table->foreign('cin_user')->references('CIN')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('demande_id')->references('id')->on('demande')
            ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('message');
    }
}
