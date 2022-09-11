<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSituacaoToEscalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escalas', function (Blueprint $table) {
            $table->boolean('situacao')->default(false)->change();
        });

        Schema::table('escalas', function (Blueprint $table) {
            $table->renameColumn('situacao', 'fechada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escalas', function (Blueprint $table) {
            $table->boolean('fechada')->default(1)->change();
        });

        Schema::table('escalas', function (Blueprint $table) {
            $table->renameColumn('fechada', 'situacao');
        });
    }
}
