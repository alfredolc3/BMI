<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSepomexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepomex', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idEstado');
            $table->string('estado',35);
            $table->integer('idMunicipio');
            $table->string('municipio',60);
            $table->string('ciudad',60);
            $table->string('zona',15);
            $table->mediumInteger('cp');
            $table->string('asentamiento',70);
            $table->string('tipo',20);
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
        Schema::drop('sepomex');
    }
}
