<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function showAboutPage()
    {
        return view('pages.about');
    }

    public function showPasswordRestorePage(){
        return view('pages.recuperarPassword');
    }

    public function showTermsandConditionsPage(){
        return view('pages.terminosCondiciones');
    }

    public function showPrivacyPolicyPage(){
        return view('pages.politicaPrivacidad');
    }

    public function showSecurityandPrivacyPage(){
        return view('pages.seguridadPrivacidad');
    }

    public function showCustomerRegistrationPage(){
        return view('pages.registrarUsuario');
    }
}
