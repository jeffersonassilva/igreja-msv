<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataToEbdCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->date('data')
                ->nullable()
                ->comment('Data da aula')
                ->change();
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
            $table->date('data')
                ->nullable(false)
                ->comment('Data da aula')
                ->change();
        });
    }
}
