<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioDashboardController extends Controller
{
    public function mostrarDashboard(){
        return view('auth.perfil');
    } 
}
