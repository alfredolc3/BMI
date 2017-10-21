<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDatosprincipalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datosPrincipales', function (Blueprint $table) {
            $table->enum('tipoValor', ['Valor de avaluo','Valor de investigacion'])->default('Valor de investigacion')->after('linkWeb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datosPrincipales', function (Blueprint $table) {
            
        });
    }
}
