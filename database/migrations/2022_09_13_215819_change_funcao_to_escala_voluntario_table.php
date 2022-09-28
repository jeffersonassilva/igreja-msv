<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFuncaoToEscalaVoluntarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escala_voluntario', function (Blueprint $table) {
            $table->string('funcao', 4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escala_voluntario', function (Blueprint $table) {
            $table->string('funcao', 2)->change();
        });
    }
}
