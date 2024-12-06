<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStudentClassRequest;
use App\Http\Requests\StoreStudentClassRequest;
use App\Http\Requests\UpdateStudentClassRequest;
use App\Models\StudentClass;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentClassesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentClasses = StudentClass::all();

        return view('admin.studentClasses.index', compact('studentClasses'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studentClasses.create');
    }

    public function store(StoreStudentClassRequest $request)
    {
        $studentClass = StudentClass::create($request->all());

        return redirect()->route('admin.student-classes.index');
    }

    public function edit(StudentClass $studentClass)
    {
        abort_if(Gate::denies('student_class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studentClasses.edit', compact('studentClass'));
    }

    public function update(UpdateStudentClassRequest $request, StudentClass $studentClass)
    {
        $studentClass->update($request->all());

        return redirect()->route('admin.student-classes.index');
    }

    public function show(StudentClass $studentClass)
    {
        abort_if(Gate::denies('student_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentClass->load('turmaMatriculars');

        return view('admin.studentClasses.show', compact('studentClass'));
    }

    public function destroy(StudentClass $studentClass)
    {
        abort_if(Gate::denies('student_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studentClass->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentClassRequest $request)
    {
        $studentClasses = StudentClass::find(request('ids'));

        foreach ($studentClasses as $studentClass) {
            $studentClass->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getStudents($id)
    {
        abort_if(Gate::denies('student_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $turma = StudentClass::find($id);

        if (!$turma) {
            return response()->json(['error' => 'Turma não encontrada'], 404);
        }

        $students = $turma->turmaMatriculars->pluck('aluno');

        $response = [
            'students' => $students,
            'full' => $turma->full,
        ];

        return response()->json($response);
    }
}
