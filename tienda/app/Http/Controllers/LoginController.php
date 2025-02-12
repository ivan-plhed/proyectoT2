<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');
        if (Auth::attempt($credenciales)) {
            return redirect()->intended(route('productos.index'));
        } else {
            $error = 'Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('productos.index');
    }
}
