<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfessorEbdToVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voluntarios', function (Blueprint $table) {
            $table->boolean('professor_ebd')->after('sexo')->default(false);
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
            $table->dropColumn('professor_ebd');
        });
    }
}
