<?php

namespace App\Http\Requests;

use App\Models\StudentClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentClassRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_class_create');
    }

    public function rules()
    {
        return [
            'nome' => [
                'string',
                'required',
            ],
            'turno' => [
                'required',
            ],
            'quantidade_de_vagas' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ano_letivo' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'serie' => [
                'required',
            ],
        ];
    }
}
