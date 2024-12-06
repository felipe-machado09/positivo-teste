<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // For Brothers
        $father = $faker->name('male');
        $mother = $faker->name('female');

        for ($i = 0; $i < 15; $i++) {
            $matricula = '2024' . str_pad($faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT);

            if ($i < 10 || $i % 2 == 0) {
                $father = $faker->name('male');
                $mother = $faker->name('female');
            }

            Student::create([
                'matricula' => $matricula,
                'nome' => $faker->firstName . ' ' . $faker->lastName,
                'data_nascimento' => $faker->date('Y-m-d', '-17 years'),
                'tipo_endereco' => $faker->randomElement([1, 2, 3]),
                'rua' => $faker->streetName,
                'cep' => $faker->postcode,
                'numero' => $faker->buildingNumber,
                'complemento' => $faker->secondaryAddress,
                'serie' => $faker->randomElement([1, 2, 3, 4]),
                'segmento' => $faker->randomElement([1, 2, 3, 4]),
                'nome_pai' => $father,
                'nome_mae' => $mother,
            ]);
        }

    }
}
