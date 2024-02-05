<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbdAlunoClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebd_aluno_classe', function (Blueprint $table) {
            $table->id();

            $table->foreignId('aluno_id')
                ->nullable()
                ->comment('Id do aluno')
                ->constrained('ebd_alunos');

            $table->foreignId('classe_id')
                ->nullable()
                ->comment('Id da classe')
                ->constrained('ebd_classes');

            $table->dropForeign(['aluno_id']);
            $table->dropForeign(['classe_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebd_aluno_classe');
    }
}
