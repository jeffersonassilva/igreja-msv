<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTituloToEbdCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->string('titulo')
                ->nullable()
                ->after('permanente')
                ->comment('Título utilizado quando for um evento permanente.');
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
            $table->dropColumn('titulo');
        });
    }
}
