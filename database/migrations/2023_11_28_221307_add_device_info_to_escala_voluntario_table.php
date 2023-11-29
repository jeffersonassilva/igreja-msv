<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeviceInfoToEscalaVoluntarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escala_voluntario', function (Blueprint $table) {
            $table->string('dispositivo_os', 25)
                ->nullable()
                ->after('justificativa')
                ->comment('Device.osName: iOS, Android, Web');

            $table->string('dispositivo_versao', 25)
                ->nullable()
                ->after('dispositivo_os')
                ->comment('Device.osVersion');

            $table->string('dispositivo_nome', 150)
                ->nullable()
                ->after('dispositivo_versao')
                ->comment('Device.deviceName: Nome que o usuário dá ao telefone');

            $table->string('dispositivo_modelo', 150)
                ->nullable()
                ->after('dispositivo_nome')
                ->comment('Device.modelName: Nome do modelo do telefone');

            $table->string('app_versao', 25)
                ->nullable()
                ->after('dispositivo_modelo')
                ->comment('Versão do aplicativo utilizado');
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
            $table->dropColumn('dispositivo_os');
            $table->dropColumn('dispositivo_versao');
            $table->dropColumn('dispositivo_nome');
            $table->dropColumn('dispositivo_modelo');
            $table->dropColumn('app_versao');
        });
    }
}
