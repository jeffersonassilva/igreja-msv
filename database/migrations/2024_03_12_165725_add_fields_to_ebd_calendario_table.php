<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEbdCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->boolean('permanente')
                ->default(false)
                ->after('tema')
                ->comment('Indicador se o evento será permanente.');

            $table->string('link')
                ->nullable()
                ->after('tema')
                ->comment('Link para aula online.');

            $table->string('local')
                ->nullable()
                ->after('tema')
                ->comment('Local da aula.');
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
            $table->dropColumn('link');
            $table->dropColumn('local');
            $table->dropColumn('permanente');
        });
    }
}
