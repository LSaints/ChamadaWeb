<?php

namespace App\model\entity;

class Student extends User
{
    /**
     * Matricula do aluno
     * @var string
     */
    public $registration;

    /**
     * Id da disciplina matriculada
     * @var string[]
     */
    public $disciplineId;
}