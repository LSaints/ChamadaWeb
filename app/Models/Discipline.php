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
        'isOpne',
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
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

    public function students()
    {
        return $this->hasMany(StudentDiscipline::class, 'discipline_id');
    }
}
