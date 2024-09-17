<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        //dump($_POST);
        $email = request()->get('email');
        $password = request()->get('password');

        $user = User::where('email', $email)->first();

        if ($user && $password = $user->password) {
            unset($user->password);

            $json = response()->json([
                'success' => true,
                'user' => $user
            ]);

            Session::put('user', $user);

            return redirect()->route('home.index');
        }

        $json = response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 401);
        return redirect()->back()->withErrors(['Invalid credentials']);
    }

    public function logout()
    {
        Session::forget('user');
        Session::flush();
    }
}
