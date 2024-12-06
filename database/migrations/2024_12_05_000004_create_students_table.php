<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula')->nullable();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('tipo_endereco');
            $table->string('rua');
            $table->string('cep');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('serie');
            $table->string('segmento')->nullable();
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
