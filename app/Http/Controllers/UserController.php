<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use App\Enums\Role;

class UserController extends Controller
{
    public function profile()
    {
        return View('profile');
    }

    public function register()
    {
        return view('register');
    }

    public function store()
    {
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
    }

    function generateStudentRegistration(string $cpf)
    {

        $currentYear = date('Y');
        $lastCharsCPF = substr($cpf, -3);
        $currentHour = date('H');
        $registration = $currentYear . $lastCharsCPF . $currentHour;

        return $registration;
    }

}
