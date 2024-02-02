<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProfessorEbdCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ebd_calendario', function (Blueprint $table) {
            $table->dropColumn('professor');

            $table->foreignId('professor_id')
                ->nullable()
                ->after('data')
                ->comment('Id do professor')
                ->constrained('ebd_professores');

            $table->dropForeign(['professor_id']);
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
            $table->string('professor')
                ->nullable()
                ->after('id')
                ->comment('Professor que ministrou a aula');

            $table->dropColumn('professor_id');
        });
    }
}
