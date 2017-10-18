<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatosPrincipalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosPrincipales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser')->unsigned();
            $table->integer('idTipoInmueble')->unsigned();
            $table->date('fechaRegistro');
            $table->string('informante');
            $table->string('telefono');
            $table->string('linkWeb');
            $table->string('valorOperacion');

             $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
             $table->foreign('idUser')->references('id')->on('tipologiasinmueble')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('datosPrincipales');
    }
}
