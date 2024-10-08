<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Discipline;
use App\Enums\Role;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profile()
    {
        $user = Session::get('user');

        if (!$user || !isset($user->id)) {
            return redirect()->route('login');
        }

        $disciplines = Discipline::where('teacherId', $user->id)->get();

        return view('profile', compact('user', 'disciplines'));
    }

    public function register()
    {
        return view('register');
    }

    public function store()
    {
        try {
            $user = User::create(
                [
                    'name' => request()->get('name', ''),
                    'email' => request()->get('email', ''),
                    'password' => request()->get('password', ''),
                    'cpf' => request()->get('cpf', ''),
                    'role' => request()->get('role', '')
                ]
            );

            if (request()->get('role', '') == 'Aluno')
            {
                $user->registration = $this->generateStudentRegistration(request()->get('cpf', ''));
                $user->save();
            }
            return redirect()->route('auth.index');
        } catch (\Throwable $th) {

        }
    }

    function generateStudentRegistration(string $cpf)
    {

        $currentYear = date('Y');
        $lastCharsCPF = substr($cpf, -4);
        $currentHour = date('H');
        $registration = $currentYear . $lastCharsCPF . $currentHour;

        return $registration;
    }

}
