<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    //Funcion que me enviara al login
    public function showLoginForm(){
        return view('auth.iniciarSesion');
    }

    public function login(Request $request){

        $credentials = $request->only('username','password');

        $user = \App\Models\Usuario::where('username', $credentials['username'])->first();
        if($user && Hash::check($credentials['password'],$user->password)){
            Auth::guard('usuario')->login($user);
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'username'=> 'Las credenciales son incorrectas',
        ]);
    }

    public function logout(Request $request){

        Auth::guard('usuario')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
}
