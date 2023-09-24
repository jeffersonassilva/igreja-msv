<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValorToNotasFiscaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->decimal('valor', 9, 2)->after('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notas_fiscais', function (Blueprint $table) {
            $table->dropColumn('valor');
        });
    }
}
