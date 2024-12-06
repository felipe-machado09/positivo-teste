<?php

namespace App\Http\Controllers\Admin;

use App\Models\Matricular;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        $alunosPorSerie = Student::select('serie', DB::raw('count(*) as total'))
            ->groupBy('serie')
            ->get()
            ->map(function($item) {
                $item->serie_nome = Student::SERIE_SELECT[$item->serie] ?? 'Desconhecida';
                return $item;
            });

        $alunosPorTurma = Matricular::select('turma_id', DB::raw('count(*) as total'))
            ->groupBy('turma_id')
            ->with('turma') // Relacionamento para obter o nome da turma
            ->get()
            ->map(function($item) {
                $item->turma_nome = $item->turma->nome ?? 'Desconhecida';
                return $item;
            });

        $relatorioIrmaos = Student::all()
            ->map(function($aluno) {
                // Buscar outros alunos com o mesmo nome do pai ou da mãe
                $irmaos = Student::where(function($query) use ($aluno) {
                    $query->where('nome_pai', $aluno->nome_pai)
                        ->orWhere('nome_mae', $aluno->nome_mae);
                })
                ->where('id', '!=', $aluno->id) // Exclui o aluno atual
                ->get();

                // Adiciona os dados dos irmãos ao aluno
                $aluno->irmaos = $irmaos->map(function($item) {
                    return [
                        'nome' => $item->nome,
                        'serie' => $item->serie,
                    ];
                });

                return $aluno;
            })
            ->filter(function($aluno) {
                return $aluno->irmaos->isNotEmpty();
            });

        return view('home', compact('alunosPorSerie', 'alunosPorTurma', 'relatorioIrmaos'));
    }
}
