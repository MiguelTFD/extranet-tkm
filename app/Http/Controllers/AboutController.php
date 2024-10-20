<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    //
    {
        // Renderiza la vista 'pages.home'
        return view('pages.about');
    }

}
