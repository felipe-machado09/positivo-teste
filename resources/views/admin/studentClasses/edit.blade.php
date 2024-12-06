@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.studentClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.student-classes.update", [$studentClass->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nome">{{ trans('cruds.studentClass.fields.nome') }}</label>
                <input class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text" name="nome" id="nome" value="{{ old('nome', $studentClass->nome) }}" required>
                @if($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentClass.fields.nome_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.studentClass.fields.turno') }}</label>
                <select class="form-control {{ $errors->has('turno') ? 'is-invalid' : '' }}" name="turno" id="turno" required>
                    <option value disabled {{ old('turno', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StudentClass::TURNO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('turno', $studentClass->turno) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('turno'))
                    <span class="text-danger">{{ $errors->first('turno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentClass.fields.turno_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="quantidade_de_vagas">{{ trans('cruds.studentClass.fields.quantidade_de_vagas') }}</label>
                <input class="form-control {{ $errors->has('quantidade_de_vagas') ? 'is-invalid' : '' }}" type="number" name="quantidade_de_vagas" id="quantidade_de_vagas" value="{{ old('quantidade_de_vagas', $studentClass->quantidade_de_vagas) }}" step="1" required>
                @if($errors->has('quantidade_de_vagas'))
                    <span class="text-danger">{{ $errors->first('quantidade_de_vagas') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentClass.fields.quantidade_de_vagas_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ano_letivo">{{ trans('cruds.studentClass.fields.ano_letivo') }}</label>
                <input class="form-control {{ $errors->has('ano_letivo') ? 'is-invalid' : '' }}" type="number" name="ano_letivo" id="ano_letivo" value="{{ old('ano_letivo', $studentClass->ano_letivo) }}" step="1" required>
                @if($errors->has('ano_letivo'))
                    <span class="text-danger">{{ $errors->first('ano_letivo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentClass.fields.ano_letivo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.studentClass.fields.serie') }}</label>
                <select class="form-control {{ $errors->has('serie') ? 'is-invalid' : '' }}" name="serie" id="serie" required>
                    <option value disabled {{ old('serie', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\StudentClass::SERIE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('serie', $studentClass->serie) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('serie'))
                    <span class="text-danger">{{ $errors->first('serie') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.studentClass.fields.serie_helper') }}</span>
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