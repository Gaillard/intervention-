<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation', function (Blueprint $table) {
            $table->id();
            $table->char('cin_user',12);
            $table->bigInteger('dem_id')->unsingned();
            $table->boolean('etat');
            $table->foreign('dem_id')->references('id')->on('demande')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cin_user')->references('CIN')->on('users')
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
        Schema::dropIfExists('affectation');
    }
}
