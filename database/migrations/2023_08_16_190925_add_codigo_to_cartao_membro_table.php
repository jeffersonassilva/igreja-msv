<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCodigoToCartaoMembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cartao_membro', function (Blueprint $table) {
            $table->string('codigo', 10)
                ->nullable()
                ->comment('Código de permissão do usuário referente ao cartão');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartao_membro', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }
}
