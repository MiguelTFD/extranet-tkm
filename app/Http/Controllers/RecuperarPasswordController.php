<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperarPasswordController extends Controller
{
    public function index(){
        return view('pages.recuperarPassword');
    }
}
