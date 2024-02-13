<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDispositivoOsToEscalaVoluntarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escala_voluntario', function (Blueprint $table) {
            $table->string('dispositivo_os')
                ->nullable()
                ->comment('Device.osName: iOS, Android, Web')
                ->change();

            $table->string('dispositivo_versao')
                ->nullable()
                ->comment('Device.osVersion')
                ->change();

            $table->string('dispositivo_nome')
                ->nullable()
                ->comment('Device.deviceName: Nome que o usuário dá ao telefone')
                ->change();

            $table->string('dispositivo_modelo')
                ->nullable()
                ->comment('Device.modelName: Nome do modelo do telefone')
                ->change();

            $table->string('app_versao')
                ->nullable()
                ->comment('Versão do aplicativo utilizado')
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
        Schema::table('escala_voluntario', function (Blueprint $table) {
            $table->string('dispositivo_os', 25)
                ->nullable()
                ->comment('Device.osName: iOS, Android, Web')
                ->change();

            $table->string('dispositivo_versao', 25)
                ->nullable()
                ->comment('Device.osVersion')
                ->change();

            $table->string('dispositivo_nome', 150)
                ->nullable()
                ->comment('Device.deviceName: Nome que o usuário dá ao telefone')
                ->change();

            $table->string('dispositivo_modelo', 150)
                ->nullable()
                ->comment('Device.modelName: Nome do modelo do telefone')
                ->change();

            $table->string('app_versao', 25)
                ->nullable()
                ->comment('Versão do aplicativo utilizado')
                ->change();
        });
    }
}
