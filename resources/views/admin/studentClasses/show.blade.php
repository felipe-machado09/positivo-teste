@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.studentClass.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.studentClass.fields.id') }}
                        </th>
                        <td>
                            {{ $studentClass->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentClass.fields.nome') }}
                        </th>
                        <td>
                            {{ $studentClass->nome }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentClass.fields.turno') }}
                        </th>
                        <td>
                            {{ App\Models\StudentClass::TURNO_SELECT[$studentClass->turno] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentClass.fields.quantidade_de_vagas') }}
                        </th>
                        <td>
                            {{ $studentClass->quantidade_de_vagas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentClass.fields.ano_letivo') }}
                        </th>
                        <td>
                            {{ $studentClass->ano_letivo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentClass.fields.serie') }}
                        </th>
                        <td>
                            {{ App\Models\StudentClass::SERIE_SELECT[$studentClass->serie] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-classes.index') }}">
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
            <a class="nav-link" href="#turma_matriculars" role="tab" data-toggle="tab">
                {{ trans('cruds.matricular.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="turma_matriculars">
            @includeIf('admin.studentClasses.relationships.turmaMatriculars', ['matriculars' => $studentClass->turmaMatriculars])
        </div>
    </div>
</div>

@endsection