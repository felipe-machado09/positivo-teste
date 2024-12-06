<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_create');
    }

    public function rules()
    {
        return [
            'matricula' => [
                'string',
                'nullable',
            ],
            'nome' => [
                'string',
                'required',
            ],
            'data_nascimento' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tipo_endereco' => [
                'required',
            ],
            'rua' => [
                'string',
                'required',
            ],
            'cep' => [
                'string',
                'required',
            ],
            'numero' => [
                'string',
                'required',
            ],
            'complemento' => [
                'string',
                'nullable',
            ],
            'serie' => [
                'required',
            ],
            'nome_pai' => [
                'string',
                'required',
            ],
            'nome_mae' => [
                'string',
                'required',
            ],
        ];
    }
}
