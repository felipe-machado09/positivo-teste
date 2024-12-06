<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id' => 2,
                'name' => 'Secretaria',
                'email' => 'secretaria@example.com',
                'password' => Hash::make('password'),
                'remember_token' => null,
            ],
            [
                'id' => 3,
                'name' => 'Assistente',
                'email' => 'assistente@example.com',
                'password' => Hash::make('password'),
                'remember_token' => null,
            ],
            [
                'id' => 4,
                'name' => 'Cadastro',
                'email' => 'cadastro@example.com',
                'password' => Hash::make('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
