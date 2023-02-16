<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Jefferson Silva',
                'email' => 'jeffersonassilva@gmail.com',
                'password' => Hash::make('12345678')
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
