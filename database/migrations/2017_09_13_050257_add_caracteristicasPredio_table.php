<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaracteristicasPredioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicasPredio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDatosPrincipales')->unsigned();
            $table->integer('idUsoSuelo')->unsigned();
            $table->integer('idUbicacionManzana')->unsigned();
            $table->integer('idTipoVialidad')->unsigned();
            $table->integer('proximidadUrbana');
            $table->integer('idClasificacionZona')->unsigned();
            $table->integer('idTopografia')->unsigned();
            $table->integer('idForma')->unsigned();
            $table->string('servicios');
            $table->integer('idFrente')->unsigned();
            $table->string('vistasPanoramicas');

            //comienzan claves foraneas
            $table->foreign('idDatosPrincipales')->references('id')->on('datosPrincipales')->onDelete('cascade');
            $table->foreign('idUsoSuelo')->references('id')->on('usosSuelo')->onDelete('cascade');
            $table->foreign('idUbicacionManzana')->references('id')->on('ubicacionesManzana')->onDelete('cascade');
            $table->foreign('idTipoVialidad')->references('id')->on('tiposVialidad')->onDelete('cascade');
            $table->foreign('idClasificacionZona')->references('id')->on('clasificacionesZona')->onDelete('cascade');
            $table->foreign('idTopografia')->references('id')->on('topografias')->onDelete('cascade');
            $table->foreign('idForma')->references('id')->on('formas')->onDelete('cascade');
            $table->foreign('idFrente')->references('id')->on('frentes')->onDelete('cascade');

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
        Schema::drop('caracteristicasPredio');
    }
}
