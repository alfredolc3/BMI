<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes', function (Blueprint $table) {
            $table->renameColumn('imagen1', 'imagen');
            $table->dropColumn('imagen2');
            $table->dropColumn('imagen3');
            $table->dropColumn('imagen4');
            $table->dropColumn('imagen5');
            $table->dropColumn('imagen6');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagenes', function (Blueprint $table) {
            //
        });
    }
}
