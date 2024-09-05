<?php

namespace App\model\entity;

abstract class User
{
    /**
     * ID do usuario
     * @var integer
     */
    public $id;

    /**
     * Nome do usuario
     * @var string
     */
    public $name;

    /**
     * Email do usuario
     * @var string
     */
    public $email;

    /**
     * Senha do usuario
     * @var string
     */
    public $password;

    /**
     * CPF do usuario
     * @var string
     */
    public $cpf;

    /**
     * Cargo do usuario
     * @var integer
     */
    public $role;
}