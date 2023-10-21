<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCartaoIdToNotasFiscaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->foreignId('cartao_id')
                ->nullable()
                ->after('verificada')
                ->comment('Identificador do cartão utilizado na nota fiscal')
                ->constrained('cartoes');
        });

        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->dropForeign(['cartao_id']);
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
            $table->dropColumn('cartao_id');
        });
    }
}
