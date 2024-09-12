<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected readonly Teacher $teacher;

    public function index()
    {
        // Retorna a view com o nome do professor
        return view('home', [
            'name' => "name teste",
            'cargo' => "cargo teste",
        ]);
    }
}
