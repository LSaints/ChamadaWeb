<?php

namespace App\Enums;

enum Role: int
{
    case Teacher = 1;
    case Student = 2;

    public function name(): string
    {
        return match ($this) {
            self::Teacher => 'Professor',
            self::Student => 'Aluno',
        };
    }
}
