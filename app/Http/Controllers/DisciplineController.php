<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\StudentDiscipline;
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


    public function AddDisciplineToStudent(string $disciplineId)
    {
        $student = Session::get('user');

        if (!$student || !isset($student->registration)) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $registration = $student->registration;

        $userExists = DB::table('users')->where('registration', $registration)->exists();
        if (!$userExists) {
            return response()->json(['error' => 'Matrícula não encontrada na tabela de usuários'], 404);
        }

        $discipline = Discipline::find($disciplineId);
        if (!$discipline) {
            return response()->json(['error' => 'Disciplina não encontrada'], 404);
        }

        try {
            DB::table('student_disciplines')->insert([
                'registration' => $registration,
                'discipline_id' => $disciplineId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/home');
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

    public function getDisciplineByStudendtRegistration()
    {
        $user = Session::get('user');
        if (!$user || !isset($user->registration)) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $disciplines = Discipline::where('registration', $user->registration)->get();
        return response()->json($disciplines);
    }

    public function getDisciplineView(string $disciplineId)
    {
        try {
            $discipline = Discipline::findOrFail($disciplineId);

            $studentDisciplines = StudentDiscipline::where('discipline_id', $discipline->id)->get();

            if ($studentDisciplines->isEmpty()) {
                return redirect()->route('home')->with('error', 'Não há alunos matriculados nesta disciplina.');
            }

            $registrationNumbers = $studentDisciplines->pluck('registration');

            $students = User::whereIn('registration', $registrationNumbers)->get();

            return view('discipline', compact('discipline', 'students'));

        } catch (ModelNotFoundException $e) {
            return redirect()->route('home')->with('error', 'Disciplina não encontrada.');
        }
    }
}
