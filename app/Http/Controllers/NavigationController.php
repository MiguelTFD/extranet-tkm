<?php

namespace App\Http\Controllers;
use App\Models\Pais;
use App\Models\TipoDocumentoIdentidad;


class NavigationController extends Controller
{
    public function showAboutPage()
    {
        return view('pages.about');
    }

    public function showContactPage(){
        return view('pages.contact');
    }

    public function showPasswordRestorePage(){
        return view('pages.recuperarPassword');
    }

    public function showTermsAndConditionsPage(){
        return view('pages.terminosCondiciones');
    }

    public function showPrivacyPolicyPage(){
        return view('pages.politicaPrivacidad');
    }

    public function showSecurityAndPrivacyPage(){
        return view('pages.seguridadPrivacidad');
    }

    public function showUserRegistrationPage(){
        $paises = Pais::all();
        $tDocumentos = TipoDocumentoIdentidad::all();
        return view('pages.registrarUsuario',compact('paises','tDocumentos'));
    }
    public function showUserLoginPage(){
        return view('auth.iniciarSesion');
    }
    //----
    public function showProductsPage(){
        return view('pages.productos');
    }
    public function showCartPage(){
        return view('pages.carritoCompras');
    }
    
    public function showOrderRequestPage(){
        $paises = Pais::all();
        $tiposDocumento = TipoDocumentoIdentidad::all();
        return view('pages.registrarOrdenCompra', compact('tiposDocumento',  'paises'));
    }    



}
