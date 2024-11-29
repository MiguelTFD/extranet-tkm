<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function userLogin(Request $request){
        $credentials = $request->only('username','password');
        $user = Usuario::where('username', $credentials['username'])->first();
        if($user && Hash::check($credentials['password'],$user->password)){
            Auth::guard('usuario')->login($user);
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'username'=> 'Las credenciales son incorrectas',
        ]);
    }

}
