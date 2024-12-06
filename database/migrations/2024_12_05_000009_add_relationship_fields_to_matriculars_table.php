<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatricularsTable extends Migration
{
    public function up()
    {
        Schema::table('matriculars', function (Blueprint $table) {
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->foreign('aluno_id', 'aluno_fk_10304661')->references('id')->on('students');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_10304662')->references('id')->on('student_classes');
        });
    }
}
