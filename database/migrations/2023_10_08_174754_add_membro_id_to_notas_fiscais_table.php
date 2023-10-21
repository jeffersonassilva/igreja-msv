<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMembroIdToNotasFiscaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->foreignId('membro_id')
                ->nullable()
                ->after('cartao_id')
                ->comment('Identificador do membro que gerou a nota fiscal')
                ->constrained('membros');
        });

        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->dropForeign(['membro_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->dropColumn('membro_id');
        });
    }
}
