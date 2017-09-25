<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrediosServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predios_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDatosPrincipales')->unsigned();
            $table->integer('idServicios')->unsigned();

            $table->foreign('idDatosPrincipales')->references('id')->on('datosPrincipales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idServicios')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('predios_servicios');
    }
}
