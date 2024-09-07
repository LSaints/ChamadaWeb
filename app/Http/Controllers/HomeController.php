<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Enums\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected readonly Teacher $teacher;

    // Construtor para injetar a dependência Teacher
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->teacher->name = "Mateus";
        $this->teacher->role = Role::Teacher;
    }

    public function index()
    {
        // Verifica se o professor está inicializado
        $teacher_name = $this->teacher->name;
        $teacher_role = $this->teacher->role;

        // Retorna a view com o nome do professor
        return view('home', [
            'name' => $teacher_name,
            'cargo' => $teacher_role->name(),
        ]);
    }
}
