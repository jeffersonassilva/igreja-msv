<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbdCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebd_calendario', function (Blueprint $table) {
            $table->id();

            $table->date('data')->comment('Data da aula');

            $table->string('professor')
                ->nullable()
                ->comment('Professor que ministrou a aula');

            $table->foreignId('classe_id')
                ->nullable()
                ->comment('Id da classe')
                ->constrained('ebd_classes');

            $table->dropForeign(['classe_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebd_calendario');
    }
}
