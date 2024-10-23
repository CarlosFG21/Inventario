<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Juan Pérez',
            'role' => 'admin',
            'email' => 'juan@example.com',
            'password' => bcrypt('contraseña123'),
        ]);

        User::create([
            'name' => 'María López',
            'role' => 'user',
            'email' => 'maria@example.com',
            'password' => bcrypt('contraseña123'),
        ]);
    }
}

