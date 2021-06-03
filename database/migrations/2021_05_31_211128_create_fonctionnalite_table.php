<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonctionnaliteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctionnalite', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fonc');
            $table->bigInteger('app_id')->unsigned();
            $table->foreign('app_id')->references('id')->on('application')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonctionnalite');
    }
}
