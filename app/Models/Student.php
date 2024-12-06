<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'students';

    protected $dates = [
        'data_nascimento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TIPO_ENDERECO_SELECT = [
        '1' => 'Cobrança',
        '2' => 'Residencial',
        '3' => 'Correspondência',
    ];

    public const SEGMENTO_SELECT = [
        '1' => 'Infantil',
        '2' => 'Anos iniciais',
        '3' => 'Anos finais',
        '4' => 'Ensino Médio',
    ];

    protected $fillable = [
        'matricula',
        'nome',
        'data_nascimento',
        'tipo_endereco',
        'rua',
        'cep',
        'numero',
        'complemento',
        'serie',
        'segmento',
        'nome_pai',
        'nome_mae',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const SERIE_SELECT = [
        '1' => 'G1 ao G3: Alunos entre 3 e 5 anos respectivamente',
        '2' => '1º ao 5º ano: Alunos entre 6 e 10 anos respectivamente;',
        '3' => '1º ao 5º ano: Alunos entre 6 e 10 anos respectivamente;',
        '4' => '1º ao 3º ano ensino médio: Alunos entre 15 e 17 anos respectivamente;',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function alunoMatriculars()
    {
        return $this->hasMany(Matricular::class, 'aluno_id', 'id');
    }

    public function getDataNascimentoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = $value ?? null;
    }
}
