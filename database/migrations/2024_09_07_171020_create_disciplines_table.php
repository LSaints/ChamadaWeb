<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinesTable extends Migration
{
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->unsignedBigInteger('teacherId');
            $table->json('studentRegistrations')->nullable(); // Lista de matrículas dos alunos
            $table->timestamps();

            // Adiciona chave estrangeira para a tabela users
            $table->foreign('teacherId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplines');
    }
}
