<?php

namespace App\Http\Requests;

use App\Models\Matricular;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMatricularRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('matricular_create');
    }

    public function rules()
    {
        return [
            'aluno_id' => [
                'required',
                'integer',
            ],
            'turma_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
