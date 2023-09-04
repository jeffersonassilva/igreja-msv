<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('foto', 100)->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->string('estado_civil', 1)
                ->nullable()
                ->comment('1=Solteiro(a); 2=Casado(a); 3=Separado(a); 4=Divorciado(a); 5=Viúvo(a);');
            $table->date('dt_nascimento')->nullable();
            $table->date('dt_casamento')->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('pais')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->integer('matricula')->nullable();
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
        Schema::dropIfExists('membros');
    }
}
