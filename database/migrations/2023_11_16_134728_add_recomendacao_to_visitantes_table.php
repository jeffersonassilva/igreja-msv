<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecomendacaoToVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitantes', function (Blueprint $table) {
            $table->integer('recomendacao')->nullable()->after('batizado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitantes', function (Blueprint $table) {
            $table->dropColumn('recomendacao');
        });
    }
}
