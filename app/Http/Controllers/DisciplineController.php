<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DisciplineController extends Controller
{

    public function create()
    {
        $user = Session::get('user');

        if (!$user || !isset($user->id)) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        try {
            $discipline = Discipline::create(
                [
                   'name' => request()->get('name', ''),
                   'capacity' => request()->get('capacity', ''),
                   'teacherId' => $user->id,
                   'isOpen' => true,
                ]
            );
            return redirect()->route('user.profile')->with('success', 'Disciplina criada com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->route('user.profile')->with('error', 'ocorreu um erro');
        }
    }

    public function getDisciplineByTeacherId()
    {
        $user = Session::get('user');
        if (!$user || !isset($user->id)) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $disciplines = Discipline::where('teacherId', $user->id)->get();
        return response()->json($disciplines);
    }

}
