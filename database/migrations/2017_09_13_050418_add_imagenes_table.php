<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDatosPrincipales')->unsigned();
            $table->string('imagen1');
            $table->string('imagen2');
            $table->string('imagen3');
            $table->string('imagen4');
            $table->string('imagen5');
            $table->string('imagen6');
            $table->string('observaciones');

             $table->foreign('idDatosPrincipales')->references('id')->on('datosPrincipales')->onDelete('cascade');
             
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
        Schema::drop('imagenes');
    }
}
