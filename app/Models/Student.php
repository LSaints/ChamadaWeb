<?php

namespace App\Models;

class Student extends User
{
    /**
     * Matrícula do aluno.
     *
     * @var string
     */
    protected $registration;

    /**
     * IDs das disciplinas matriculadas.
     *
     * @var array
     */
    protected $disciplineId = [];

    /**
     * Atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'role',
        'registration',
        'disciplineId', // Adicione disciplineId aqui
    ];

    /**
     * Obter a matrícula do aluno.
     *
     * @return string
     */
    public function getRegistrationAttribute(): string
    {
        return $this->attributes['registration'];
    }

    /**
     * Definir a matrícula do aluno.
     *
     * @param string $value
     */
    public function setRegistrationAttribute(string $value): void
    {
        $this->attributes['registration'] = $value;
    }

    /**
     * Obter os IDs das disciplinas matriculadas.
     *
     * @return array
     */
    public function getDisciplineIdAttribute(): array
    {
        return $this->attributes['disciplineId'] ? json_decode($this->attributes['disciplineId'], true) : [];
    }

    /**
     * Definir os IDs das disciplinas matriculadas.
     *
     * @param array $value
     */
    public function setDisciplineIdAttribute(array $value): void
    {
        $this->attributes['disciplineId'] = json_encode($value);
    }
}
