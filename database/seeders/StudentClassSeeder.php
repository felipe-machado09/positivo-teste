<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentClass;

class StudentClassSeeder extends Seeder
{
    public function run()
    {
        StudentClass::create([
            'nome' => 'Turma A - G1 ao G3',
            'turno' => 1, // Manhã
            'quantidade_de_vagas' => 30,
            'ano_letivo' => 2024,
            'serie' => 1, // G1 ao G3
        ]);

        StudentClass::create([
            'nome' => 'Turma B - 1º ao 5º ano',
            'turno' => 2, // Tarde
            'quantidade_de_vagas' => 25,
            'ano_letivo' => 2024,
            'serie' => 2, // 1º ao 5º ano
        ]);

        StudentClass::create([
            'nome' => 'Turma C - 6º ao 9º ano',
            'turno' => 3, // Noite
            'quantidade_de_vagas' => 20,
            'ano_letivo' => 2024,
            'serie' => 3, // 6º ao 9º ano
        ]);

        StudentClass::create([
            'nome' => 'Turma D - 1º ao 3º ano Ensino Médio',
            'turno' => 1, // Manhã
            'quantidade_de_vagas' => 30,
            'ano_letivo' => 2024,
            'serie' => 4, // 1º ao 3º ano ensino médio
        ]);
    }
}
