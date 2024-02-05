<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEbdClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebd_classes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        $this->seed();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebd_classes');
    }

    /**
     * @return void
     */
    private function seed()
    {
        DB::table('ebd_classes')->insert([
            ['nome' => 'Adolescentes'],
            ['nome' => 'Homens'],
            ['nome' => 'Infantil I'],
            ['nome' => 'Infantil II'],
            ['nome' => 'Jovens'],
            ['nome' => 'Juniores'],
            ['nome' => 'Mulheres'],
            ['nome' => 'Namorados/Noivos'],
        ]);
    }
}
