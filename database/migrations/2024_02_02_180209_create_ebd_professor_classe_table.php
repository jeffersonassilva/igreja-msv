<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbdProfessorClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebd_professor_classe', function (Blueprint $table) {
            $table->id();

            $table->foreignId('professor_id')
                ->nullable()
                ->comment('Id do professor')
                ->constrained('ebd_professores');

            $table->foreignId('classe_id')
                ->nullable()
                ->comment('Id da classe')
                ->constrained('ebd_classes');

            $table->dropForeign(['professor_id']);
            $table->dropForeign(['classe_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebd_professor_classe');
    }
}
