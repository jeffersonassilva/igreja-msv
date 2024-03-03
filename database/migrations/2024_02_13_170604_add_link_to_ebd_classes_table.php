<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkToEbdClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_classes', function (Blueprint $table) {
            $table->string('link')
                ->nullable()
                ->after('revista')
                ->comment('Link da revista.');
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
            $table->dropColumn('link');
        });
    }
}
