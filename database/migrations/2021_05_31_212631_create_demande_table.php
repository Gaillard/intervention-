<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande', function (Blueprint $table) {
            $table->id();
            $table->char('cin_user',12);
            $table->bigInteger('app_id')->unsigned();
            $table->bigInteger('fonc_id')->unsigned();
            $table->foreign('cin_user')->references('CIN')->on('users')
            ->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('app_id')->references('id')->on('application')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fonc_id')->references('id')->on('fonctionnalite')
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
        Schema::dropIfExists('demande');
    }
}
