<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerSupport extends Controller
{
    public function verTC(){
        return view('pages.terminosCondiciones');
    } 
    public function verPP(){
        return view('pages.politicaPrivacidad');
    }
    public function verSP(){
        return view('pages.seguridadPrivacidad');
        
    }
}
