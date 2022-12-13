<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFotoToVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voluntarios', function (Blueprint $table) {
            $table->string('foto', 100)
                ->nullable()
                ->after('professor_ebd')
                ->comment('Foto do voluntário.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voluntarios', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
}
