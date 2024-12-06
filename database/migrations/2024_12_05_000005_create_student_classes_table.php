<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassesTable extends Migration
{
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('turno');
            $table->integer('quantidade_de_vagas');
            $table->integer('ano_letivo');
            $table->string('serie');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
