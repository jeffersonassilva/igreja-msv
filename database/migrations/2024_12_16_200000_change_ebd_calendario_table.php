<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEBDCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->dropColumn('tema');
            $table->dropColumn('local');
            $table->dropColumn('link');
            $table->dropColumn('permanente');
            $table->dropColumn('titulo');
            $table->dropColumn('monitor');
            $table->dropColumn('professor_id');
            $table->dropColumn('classe_id');

            $table->string('responsavel')
                ->nullable()
                ->after('data')
                ->comment('Responsável por conduzir a EBD.');

            $table->string('secretario')
                ->nullable()
                ->after('responsavel')
                ->comment('Secretária(o) escalada(o) para o dia.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->string('tema')
                ->nullable()
                ->after('data')
                ->comment('Tema da lição.');

            $table->string('local')
                ->nullable()
                ->after('tema')
                ->comment('Local da aula.');

            $table->string('link')
                ->nullable()
                ->after('local')
                ->comment('Link para aula online.');

            $table->boolean('permanente')
                ->default(false)
                ->after('link')
                ->comment('Indicador se o evento será permanente.');

            $table->string('titulo')
                ->nullable()
                ->after('permanente')
                ->comment('Título utilizado quando for um evento permanente.');

            $table->string('monitor')
                ->nullable()
                ->after('titulo')
                ->comment('Nome do monitor(a) para a classe do infantil.');

            $table->foreignId('professor_id')
                ->nullable()
                ->after('monitor')
                ->comment('Id do professor')
                ->constrained('ebd_professores');

            $table->foreignId('classe_id')
                ->nullable()
                ->after('professor_id')
                ->comment('Id da classe')
                ->constrained('ebd_classes');

            $table->dropForeign(['professor_id']);
            $table->dropForeign(['classe_id']);

            $table->dropColumn('responsavel');
            $table->dropColumn('secretario');
        });
    }
}
