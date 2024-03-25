<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfosAdicionaisEbdEscalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escalas', function (Blueprint $table) {
            $table->string('dirigente')
                ->nullable()
                ->after('evento_id')
                ->comment('Dirigente do culto.');

            $table->string('pregador')
                ->nullable()
                ->after('dirigente')
                ->comment('Pregador do culto.');

            $table->string('tema')
                ->nullable()
                ->after('pregador')
                ->comment('Tema da pregação.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escalas', function (Blueprint $table) {
            $table->dropColumn('dirigente');
            $table->dropColumn('pregador');
            $table->dropColumn('tema');
        });
    }
}
