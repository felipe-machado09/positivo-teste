<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMatricularRequest;
use App\Http\Requests\StoreMatricularRequest;
use App\Http\Requests\UpdateMatricularRequest;
use App\Models\Matricular;
use App\Models\Student;
use App\Models\StudentClass;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MatricularController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('matricular_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matriculars = Matricular::with(['aluno', 'turma'])->get();

        return view('admin.matriculars.index', compact('matriculars'));
    }

    public function create()
    {
        abort_if(Gate::denies('matricular_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alunos = Student::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = StudentClass::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.matriculars.create', compact('alunos', 'turmas'));
    }

    public function store(StoreMatricularRequest $request)
    {
        $turma = StudentClass::find($request->turma_id);

        if ($turma->full) {
            return back()->withErrors(['turma' => 'Esta turma já está cheia.']);
        }

        $matricular = Matricular::create($request->all());

        return redirect()->route('admin.matriculars.index');
    }

    public function edit(Matricular $matricular)
    {
        abort_if(Gate::denies('matricular_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alunos = Student::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $turmas = StudentClass::pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $matricular->load('aluno', 'turma');

        return view('admin.matriculars.edit', compact('alunos', 'matricular', 'turmas'));
    }

    public function update(UpdateMatricularRequest $request, Matricular $matricular)
    {
        $matricular->update($request->all());

        return redirect()->route('admin.matriculars.index');
    }

    public function show(Matricular $matricular)
    {
        abort_if(Gate::denies('matricular_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matricular->load('aluno', 'turma');

        return view('admin.matriculars.show', compact('matricular'));
    }

    public function destroy(Matricular $matricular)
    {
        abort_if(Gate::denies('matricular_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $matricular->delete();

        return back();
    }

    public function massDestroy(MassDestroyMatricularRequest $request)
    {
        $matriculars = Matricular::find(request('ids'));

        foreach ($matriculars as $matricular) {
            $matricular->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
