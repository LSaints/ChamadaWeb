<?php

namespace App\model\entity;

class Discipline 
{
    /**
     * Id da disciplina
     * @var string
     */
    public $id;

    /**
     * nome da disciplina
     * @var string
     */
    public $name;

    /**
     * capacidade de alunos da disciplina
     * @var integer
     */
    public $capacity;

    /**
     * Id do professor da disciplina
     * @var integer
     */
    public $teacherId;

    /**
     * Lista de matriculas de alunos cadastrados na disciplina
     * @var string[]
     */
    public $studentRegistrations;
}