<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClass extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'student_classes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TURNO_SELECT = [
        '1' => 'Manhã',
        '2' => 'Tarde',
        '3' => 'Noite',
    ];

    public const SERIE_SELECT = [
        '1' => 'G1 ao G3',
        '2' => '1º ao 5º ano',
        '3' => '6º ao 9º ano',
        '4' => '1º ao 3º ano ensino médio',
    ];

    protected $fillable = [
        'nome',
        'turno',
        'quantidade_de_vagas',
        'ano_letivo',
        'serie',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function turmaMatriculars()
    {
        return $this->hasMany(Matricular::class, 'turma_id', 'id');
    }

    public function getFullAttribute()
    {
        return $this->quantidade_de_vagas <= $this->turmaMatriculars->count();
    }
}
