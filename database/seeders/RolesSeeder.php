<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => '1', 'descricao' => 'Administrador'],
            ['id' => '2', 'descricao' => 'Pastor'],
            ['id' => '3', 'descricao' => 'Gestor de Escalas'],
        ];

        foreach ($data as $item) {
            Role::create($item);
        }

        DB::table('role_user')->insert([
            'id' => '1',
            'role_id' => 1,
            'user_id' => 1,
        ]);
    }
}
