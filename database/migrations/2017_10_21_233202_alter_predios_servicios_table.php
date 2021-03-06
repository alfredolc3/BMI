<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPrediosServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::rename('predios_servicios', 'caracteristicapredio_servicio');
        Schema::table('caracteristicapredio_servicio', function (Blueprint $table) {
            $table->renameColumn('idcaracteristicaspredio', 'caracteristicapredio_id');
            $table->renameColumn('idservicios', 'servicio_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predios_servicios', function (Blueprint $table) {
            //
        });
    }
}
