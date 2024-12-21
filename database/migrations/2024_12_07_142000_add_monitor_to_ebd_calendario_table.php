<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonitorToEbdCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->string('monitor')
                ->nullable()
                ->after('titulo')
                ->comment('Nome do monitor(a) para a classe do infantil.');
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
            $table->dropColumn('monitor');
        });
    }
}
