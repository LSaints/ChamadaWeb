<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attribute;

abstract class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'role',
    ];

    protected $hidden = [
      'password',
    ];

    protected $casts = [
        'role' => Role::class,
    ];

    public function getRoleAttribute($value): Role
    {
        return Role::from($value);
    }

    public function setRoleAttribute(Role $value): void
    {
        $this->attributes['role'] = $value->value;
    }
}
