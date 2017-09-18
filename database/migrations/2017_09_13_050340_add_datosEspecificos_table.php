<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatosEspecificosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosEspecificos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDatosPrincipales')->unsigned();
            $table->string('calle');
            $table->integer('numero');
            $table->integer('idSepomex')->unsigned();
            $table->string('longitud');
            $table->string('latitud');
            $table->string('altitud');
            $table->integer('idTipologiaInmueble')->unsigned();
            $table->integer('idRegimenPropiedad')->unsigned();
            $table->integer('idTipoTerreno')->unsigned();
            $table->string('superficieTerreno');
            $table->string('superficieConstruccion');
            $table->string('superficieComun');
            $table->integer('indiviso');

            $table->foreign('idDatosPrincipales')->references('id')->on('datosPrincipales')->onDelete('cascade');
            $table->foreign('idSepomex')->references('id')->on('sepomex')->onDelete('cascade');
            $table->foreign('idTipologiaInmueble')->references('id')->on('tipologiasInmueble')->onDelete('cascade');
            $table->foreign('idRegimenPropiedad')->references('id')->on('regimenes')->onDelete('cascade');
            $table->foreign('idTipoTerreno')->references('id')->on('tiposTerreno')->onDelete('cascade');

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
        Schema::drop('datosEspecificos');
    }
}
