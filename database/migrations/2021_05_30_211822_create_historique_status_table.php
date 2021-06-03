<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_status', function (Blueprint $table) {
            $table->id();
            $table->char('cin_user',12);
            $table->bigInteger('dem_id')->unsingned();
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
        Schema::dropIfExists('historique_status');
    }
}
