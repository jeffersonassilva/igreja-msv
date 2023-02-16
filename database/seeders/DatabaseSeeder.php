<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EventosSeeder::class,
            EscalasSeeder::class,
            VoluntariosSeeder::class,
            PropositosSeeder::class,
            PastorSeeder::class,

            UsuarioSeeder::class,
            RolesSeeder::class,
            PermissionsSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
