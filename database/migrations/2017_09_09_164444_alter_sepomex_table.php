<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSepomexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sepomex', function (Blueprint $table) {
           $table->renameColumn('zona', 'tipoZona');
           $table->renameColumn('tipo', 'tipoAsentamiento');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sepomex', function (Blueprint $table) {
            //
        });
    }
}
