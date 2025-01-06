<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEBDEscalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebd_escalas', function (Blueprint $table) {
            $table->id();

            $table->string('tema')
                ->nullable()
                ->comment('Tema da lição.');

            $table->string('local')
                ->nullable()
                ->comment('Local da aula.');

            $table->string('link')
                ->nullable()
                ->comment('Link para aula online.');

            $table->boolean('permanente')
                ->default(false)
                ->comment('Indicador se o evento será permanente.');

            $table->string('titulo')
                ->nullable()
                ->comment('Título utilizado quando for um evento permanente.');

            $table->string('monitor')
                ->nullable()
                ->comment('Nome do monitor(a) para a classe do infantil.');

            $table->foreignId('professor_id')
                ->nullable()
                ->comment('Id do professor')
                ->constrained('ebd_professores');

            $table->foreignId('classe_id')
                ->nullable()
                ->comment('Id da classe')
                ->constrained('ebd_classes');

            $table->foreignId('calendario_id')
                ->nullable()
                ->comment('Id do calendário')
                ->constrained('ebd_calendario');

            $table->dropForeign(['professor_id']);
            $table->dropForeign(['classe_id']);
            $table->dropForeign(['calendario_id']);

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
        Schema::dropIfExists('ebd_escalas');
    }
}
