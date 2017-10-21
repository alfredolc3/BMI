<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDatosespecificosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datosespecificos', function (Blueprint $table) {
            $table->dropColumn('superficieComun');
            $table->dropColumn('indiviso');
            $table->string('idUsoSuelo')->after('superficieConstruccion');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datosespecificos', function (Blueprint $table) {
            //
        });
    }
}
