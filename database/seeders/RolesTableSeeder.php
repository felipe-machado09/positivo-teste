<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Secretaria',
            ],
            [
                'id'    => 3,
                'title' => 'Assistente',
            ],
            [
                'id'    => 4,
                'title' => 'Cadastro',
            ],
        ];

        Role::insert($roles);
    }
}
