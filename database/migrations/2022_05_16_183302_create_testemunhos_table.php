<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestemunhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testemunhos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('telefone', 15)->nullable();
            $table->text('mensagem');
            $table->boolean('situacao')->default(false);
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
        Schema::dropIfExists('testemunhos');
    }
}
