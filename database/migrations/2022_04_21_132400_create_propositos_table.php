<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropositosTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('propositos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 30);
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propositos');
    }
}
