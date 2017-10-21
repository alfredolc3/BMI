<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCaracteristicaspredioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caracteristicaspredio', function (Blueprint $table) {
            $table->dropColumn('servicios');
            $table->dropForeign('caracteristicaspredio_idusosuelo_foreign');
            $table->dropColumn('idUsoSuelo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caracteristicaspredio', function (Blueprint $table) {

        });
    }
}
