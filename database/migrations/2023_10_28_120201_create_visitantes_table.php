<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->date('dt_visita')->comment('Data da primeira visita');
            $table->string('nome');
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->date('dt_nascimento')->nullable();
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->boolean('whatsapp')->nullable();
            $table->boolean('batizado')->nullable();
            $table->string('responsavel')->nullable()->comment('Responsável por acompanhar o visitante');
            $table->boolean('sem_sucesso')->nullable()->comment('Indicador que não houve sucesso no contato');
            $table->boolean('primeiro_contato')->nullable()->comment('Indicador que houve o primeiro contato');
            $table->date('dt_primeiro_contato')->nullable()->comment('Data do primeiro contato');
            $table->date('dt_segunda_visita')->nullable()->comment('Data da segunda visita na igreja');
            $table->boolean('congregando')->nullable()->comment('Indicador que o visitante está congregando');
            $table->boolean('deseja_batismo')->nullable()->comment('Indicador que o visitante deseja se batizar');
            $table->boolean('membro_ativo')->nullable()->comment('Indicador que o visitante tornou-se membro');
            $table->text('observacao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitantes');
    }
}
