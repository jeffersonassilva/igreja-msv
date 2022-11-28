<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJustificativaToEscalaVoluntarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escala_voluntario', function (Blueprint $table) {
            $table->string('justificativa')
                ->after('comparecimento')
                ->nullable()
                ->comment('Justificativa da falta na escala');
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
            $table->dropColumn('justificativa');
        });
    }
}
