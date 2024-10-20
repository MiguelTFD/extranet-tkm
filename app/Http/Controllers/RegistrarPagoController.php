<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarPagoController extends Controller
{

    //definimos un construcctor para el middleware
    //Asi vamos a bloquear esta vista a menos
    //Que Hayamos iniciado Sesion
    public function __construct()
    {
        $this->middleware('auth:usuario');
    }


    public function verPasosDeCompra(){
        return view('pages.registrarOrdenCompra');
    }
}
