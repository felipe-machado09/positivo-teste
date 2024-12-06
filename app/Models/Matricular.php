<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricular extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'matriculars';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'aluno_id',
        'turma_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function aluno()
    {
        return $this->belongsTo(Student::class, 'aluno_id');
    }

    public function turma()
    {
        return $this->belongsTo(StudentClass::class, 'turma_id');
    }
}
