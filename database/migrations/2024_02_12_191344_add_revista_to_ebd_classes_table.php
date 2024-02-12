<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRevistaToEbdClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_classes', function (Blueprint $table) {
            $table->string('revista', 100)
                ->nullable()
                ->after('nome')
                ->comment('Capa da revista.');
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
            $table->dropColumn('revista');
        });
    }
}
