@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.matricular.title_singular') }}
    </div>

    @if ($errors->has('turma'))
        <div class="alert alert-danger">
            {{ $errors->first('turma') }}
        </div>
    @endif

    <div class="card-body">
        <form method="POST" action="{{ route("admin.matriculars.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="required" for="turma_id">{{ trans('cruds.matricular.fields.turma') }}</label>
                <select class="form-control select2 {{ $errors->has('turma') ? 'is-invalid' : '' }}" name="turma_id" id="turma_id" onchange="searchStudents(event)" required>
                    @foreach($turmas as $id => $entry)
                        <option value="{{ $id }}" {{ old('turma_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('turma'))
                    <span class="text-danger">{{ $errors->first('turma') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricular.fields.turma_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="aluno_id">{{ trans('cruds.matricular.fields.aluno') }}</label>
                <select class="form-control select2 {{ $errors->has('aluno') ? 'is-invalid' : '' }}" name="aluno_id" id="aluno_id" required>
                    @foreach($alunos as $id => $entry)
                        <option value="{{ $id }}" {{ old('aluno_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('aluno'))
                    <span class="text-danger">{{ $errors->first('aluno') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.matricular.fields.aluno_helper') }}</span>
            </div>

            <section class="validations-section">
                <h4 id="full" class="text-danger text-center" style="display: none;">A turma selecionada está cheia</h4>

                <div class="show-turmas" id="studentsTable" style="display: none;">
                    <h3>Alunos na turma seleciona</h3>

                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nome</th>
                                <th>Data Nascimento</th>
                                <th>Tipo Endereço</th>
                                <th>Rua</th>
                                <th>Cep</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Série</th>
                                <th>Segmento</th>
                                <th>Nome Pai</th>
                                <th>Nome Mãe</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </section>

            <div class="form-group">
                <button id="btn-sbumit" class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<script>
const searchStudents = (e) => {
    const value = e.target.value;

    if (value) {
        $.ajax({
            url: `/admin/class/${value}`, 
            method: 'GET',
            success: function(response) {
                $('#studentsTable').show()
                const tbody = $('#studentsTable tbody');
                tbody.empty();

                if (response.full) {
                    $('#full').show()
                    $('#btn-submit').prop('disabled', false);
                } else {
                    $('#full').hide()
                    $('#btn-submit').prop('disabled', true);
                }

                response.students.forEach(student => {
                    tbody.append(`
                        <tr>
                            <td>${student.matricula}</td>
                            <td>${student.nome}</td>
                            <td>${student.data_nascimento}</td>
                            <td>${student.tipo_endereco}</td>
                            <td>${student.rua}</td>
                            <td>${student.cep}</td>
                            <td>${student.numero}</td>
                            <td>${student.complemento}</td>
                            <td>${student.serie}</td>
                            <td>${student.segmento}</td>
                            <td>${student.nome_pai}</td>
                            <td>${student.nome_mae}</td>
                        </tr>
                    `);
                });
            },
            error: function(error) {
                console.error('Erro ao buscar alunos:', error);
            }
        });
    } else {
        $('#studentsTable').hide()
        $('#full').hide()
        $('#btn-submit').prop('disabled', true);
    }
};

</script>
@endsection