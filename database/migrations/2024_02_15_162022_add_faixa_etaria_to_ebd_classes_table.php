<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFaixaEtariaToEbdClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_classes', function (Blueprint $table) {
            $table->string('faixa_etaria')
                ->nullable()
                ->after('nome')
                ->comment('Faixa etária da classe.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ebd_classes', function (Blueprint $table) {
            $table->dropColumn('faixa_etaria');
        });
    }
}
