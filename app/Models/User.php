<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attribute;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'role',
        'registration'
    ];

    protected $hidden = [
      'password',
    ];

    public function disciplines()
    {
        return $this->hasMany(StudentDiscipline::class, 'registration', 'id');
    }
}
