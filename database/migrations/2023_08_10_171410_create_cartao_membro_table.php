<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaoMembroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao_membro', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cartao_id')
                ->nullable()
                ->comment('Id do cartão')
                ->constrained('cartoes');

            $table->foreignId('membro_id')
                ->nullable()
                ->comment('Id do membro')
                ->constrained('membros');

            $table->dropForeign(['cartao_id']);
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
        Schema::dropIfExists('cartao_membro');
    }
}
