<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDiscipline extends Model
{
    use HasFactory;

    protected $table = 'student_disciplines';

    protected $fillable = [
        'registration',
        'discipline_id',
    ];

    /**
     * Relacionamento com o usuário (estudante).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'registration');
    }

    /**
     * Relacionamento com a disciplina.
     */
    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
