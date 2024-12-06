<?php

namespace Database\Seeders;

use App\Models\Matricular;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatricularSeeder extends Seeder
{
    public function run()
    {
        $students = Student::all();
        $studentClasses = StudentClass::all();

        if ($students->isEmpty() || $studentClasses->isEmpty()) {
            return false;
        }

        foreach ($students as $student) {
            Matricular::create([
                'aluno_id' => $student->id,
                'turma_id' => $studentClasses->random()->id,
            ]);
        }
    }
}
