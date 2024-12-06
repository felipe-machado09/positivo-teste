@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.student.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.id') }}
                        </th>
                        <td>
                            {{ $student->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.matricula') }}
                        </th>
                        <td>
                            {{ $student->matricula }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.nome') }}
                        </th>
                        <td>
                            {{ $student->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.data_nascimento') }}
                        </th>
                        <td>
                            {{ $student->data_nascimento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.tipo_endereco') }}
                        </th>
                        <td>
                            {{ App\Models\Student::TIPO_ENDERECO_SELECT[$student->tipo_endereco] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.rua') }}
                        </th>
                        <td>
                            {{ $student->rua }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.cep') }}
                        </th>
                        <td>
                            {{ $student->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.numero') }}
                        </th>
                        <td>
                            {{ $student->numero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.complemento') }}
                        </th>
                        <td>
                            {{ $student->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.serie') }}
                        </th>
                        <td>
                            {{ App\Models\Student::SERIE_SELECT[$student->serie] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.segmento') }}
                        </th>
                        <td>
                            {{ App\Models\Student::SEGMENTO_SELECT[$student->segmento] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.nome_pai') }}
                        </th>
                        <td>
                            {{ $student->nome_pai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.student.fields.nome_mae') }}
                        </th>
                        <td>
                            {{ $student->nome_mae }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.students.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#aluno_matriculars" role="tab" data-toggle="tab">
                {{ trans('cruds.matricular.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="aluno_matriculars">
            @includeIf('admin.students.relationships.alunoMatriculars', ['matriculars' => $student->alunoMatriculars])
        </div>
    </div>
</div>

@endsection