@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.update", [$student->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="matricula">{{ trans('cruds.student.fields.matricula') }}</label>
                <input class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}" type="text" name="matricula" id="matricula" value="{{ old('matricula', $student->matricula) }}">
                @if($errors->has('matricula'))
                    <span class="text-danger">{{ $errors->first('matricula') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.matricula_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.student.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $student->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="data_nascimento">{{ trans('cruds.student.fields.data_nascimento') }}</label>
                <input class="form-control date {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}" type="text" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento', $student->data_nascimento) }}" required>
                @if($errors->has('data_nascimento'))
                    <span class="text-danger">{{ $errors->first('data_nascimento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.data_nascimento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.student.fields.tipo_endereco') }}</label>
                <select class="form-control {{ $errors->has('tipo_endereco') ? 'is-invalid' : '' }}" name="tipo_endereco" id="tipo_endereco" required>
                    <option value disabled {{ old('tipo_endereco', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Student::TIPO_ENDERECO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tipo_endereco', $student->tipo_endereco) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_endereco'))
                    <span class="text-danger">{{ $errors->first('tipo_endereco') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.tipo_endereco_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rua">{{ trans('cruds.student.fields.rua') }}</label>
                <input class="form-control {{ $errors->has('rua') ? 'is-invalid' : '' }}" type="text" name="rua" id="rua" value="{{ old('rua', $student->rua) }}" required>
                @if($errors->has('rua'))
                    <span class="text-danger">{{ $errors->first('rua') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.rua_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cep">{{ trans('cruds.student.fields.cep') }}</label>
                <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text" name="cep" id="cep" value="{{ old('cep', $student->cep) }}" required>
                @if($errors->has('cep'))
                    <span class="text-danger">{{ $errors->first('cep') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="numero">{{ trans('cruds.student.fields.numero') }}</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" id="numero" value="{{ old('numero', $student->numero) }}" required>
                @if($errors->has('numero'))
                    <span class="text-danger">{{ $errors->first('numero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.numero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.student.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', $student->complemento) }}">
                @if($errors->has('complemento'))
                    <span class="text-danger">{{ $errors->first('complemento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.student.fields.serie') }}</label>
                <select class="form-control {{ $errors->has('serie') ? 'is-invalid' : '' }}" name="serie" id="serie" required>
                    <option value disabled {{ old('serie', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Student::SERIE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('serie', $student->serie) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('serie'))
                    <span class="text-danger">{{ $errors->first('serie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.serie_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.student.fields.segmento') }}</label>
                <select class="form-control {{ $errors->has('segmento') ? 'is-invalid' : '' }}" name="segmento" id="segmento">
                    <option value disabled {{ old('segmento', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Student::SEGMENTO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('segmento', $student->segmento) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('segmento'))
                    <span class="text-danger">{{ $errors->first('segmento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.segmento_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome_pai">{{ trans('cruds.student.fields.nome_pai') }}</label>
                <input class="form-control {{ $errors->has('nome_pai') ? 'is-invalid' : '' }}" type="text" name="nome_pai" id="nome_pai" value="{{ old('nome_pai', $student->nome_pai) }}" required>
                @if($errors->has('nome_pai'))
                    <span class="text-danger">{{ $errors->first('nome_pai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.nome_pai_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nome_mae">{{ trans('cruds.student.fields.nome_mae') }}</label>
                <input class="form-control {{ $errors->has('nome_mae') ? 'is-invalid' : '' }}" type="text" name="nome_mae" id="nome_mae" value="{{ old('nome_mae', $student->nome_mae) }}" required>
                @if($errors->has('nome_mae'))
                    <span class="text-danger">{{ $errors->first('nome_mae') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.nome_mae_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection