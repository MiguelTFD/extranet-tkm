<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;

class ContactController extends Controller
{
    public function index(){
        return view('pages.contact');
    }
    public function store(Request $request){

        $request->validate([
            'name'=> 'required',
            'subject'=> 'required',
            'telefono'=> 'required',
            'email'=> 'required|email',
            'message'=> 'required'
        ]);
        
        Mail::to('henry.management@thekingmoss.com')
            ->send(new ContactoMailable($request->all()));
        return redirect()->back()->with("success", "Se ha enviado el mensaje");
    }
}
