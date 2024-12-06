@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        Seja bem vindo! Você está logado, {{ auth()->user()->name }}!
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Total de alunos cadastrados por série
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Série</th>
                                <th scope="col">Total de Alunos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunosPorSerie as $item)
                                <tr>
                                    <td>{{ $item->serie_nome }}</td>
                                    <td>{{ $item->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Total de alunos matriculados por turma
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Turma</th>
                                <th scope="col">Total de Alunos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alunosPorTurma as $item)
                                <tr>
                                    <td>{{ $item->turma_nome }}</td>
                                    <td>{{ $item->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Relatório de irmãos
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nome do Aluno</th>
                                <th scope="col">Série do Aluno</th>
                                <th scope="col">Irmãos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($relatorioIrmaos as $aluno)
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->serie }}</td>
                                    <td>
                                        @foreach ($aluno->irmaos as $irmao)
                                            <p>{{ $irmao['nome'] }} - Série: {{ $irmao['serie'] }}</p>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection