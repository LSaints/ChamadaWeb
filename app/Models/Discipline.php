<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    /**
     * Nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'disciplines';

    /**
     * Atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'capacity',
        'teacherId',
        'studentRegistrations',
        'isOpne',
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'studentRegistrations' => 'array', // Converte o campo studentRegistrations para um array
        'isOpen' => 'boolean',
    ];

    /**
     * Obter o ID do professor da disciplina.
     *
     * @return int
     */
    public function getTeacherIdAttribute(): int
    {
        return $this->attributes['teacherId'];
    }

    /**
     * Definir o ID do professor da disciplina.
     *
     * @param int $value
     */
    public function setTeacherIdAttribute(int $value): void
    {
        $this->attributes['teacherId'] = $value;
    }

    /**
     * Obter a lista de matrículas dos alunos cadastrados na disciplina.
     *
     * @return array
     */
    public function getStudentRegistrationsAttribute(): array
    {
        return $this->attributes['studentRegistrations'] ? json_decode($this->attributes['studentRegistrations'], true) : [];
    }

    /**
     * Definir a lista de matrículas dos alunos cadastrados na disciplina.
     *
     * @param array $value
     */
    public function setStudentRegistrationsAttribute(array $value): void
    {
        $this->attributes['studentRegistrations'] = json_encode($value);
    }
}
