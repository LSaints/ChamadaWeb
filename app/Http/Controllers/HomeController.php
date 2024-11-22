<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\StudentDiscipline;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $user = Session::get('user');
        $disciplines_id = StudentDiscipline::where('registration', $user->registration)->pluck('discipline_id');
        $disciplines = Discipline::whereIn('id', $disciplines_id)->get();

        return view('home', compact('user', 'disciplines'));
    }

}
