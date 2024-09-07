<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends AbstractUser
{
    /**
     * Disciplina do professor.
     *
     * @var string
     */
    protected $disciplinaId;

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
        'disciplinaId', // Adicione disciplinaId aqui
    ];

    /**
     * Obtenha o valor da disciplina do professor.
     *
     * @return string
     */
    public function getDisciplinaIdAttribute(): string
    {
        return $this->attributes['disciplinaId'];
    }

    /**
     * Defina o valor da disciplina do professor.
     *
     * @param string $value
     */
    public function setDisciplinaIdAttribute(string $value): void
    {
        $this->attributes['disciplinaId'] = $value;
    }
}
