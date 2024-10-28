<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TipoDocumentoIdentidad;
use App\Models\Direccion;
use App\Models\TipoDireccion;
use App\Models\DocumentoIdentidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pais;

class UsuarioController extends Controller
{

    public function registro()
    {
        $paises = Pais::all();
        $tiposDocumento = TipoDocumentoIdentidad::all();
        $tiposDireccion = TipoDireccion::all(); // Para llenar el select de tipo dirección
        return view('pages.registrarUsuario', compact('tiposDocumento',  'tiposDireccion','paises'));
    }

    public function crearusuario(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'username' => 'required|unique:usuario,username',
            'password' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:usuario,correo',
            'direccionExacta' => 'required',
            'referencia' => 'required',
            'idDistrito' => 'required', 
            'idTipoDireccion' => 'required', 
            'numeroDocumentoIdentidad' => 'required|unique:documentoIdentidad,numeroDocumentoIdentidad',
            'idTipoDocumentoIdentidad' => 'required' 
        ]);


        DB::beginTransaction(); // Inicia la transacción

        try {
            // Crear la dirección
            $direccion = Direccion::create([
                'idDistrito' => $validated['idDistrito'],
                'direccionExacta' => $validated['direccionExacta'],
                'referencia' => $validated['referencia'],
                'idTipoDireccion' => $validated['idTipoDireccion']
            ]);

            // Crear el usuario y solucionando el problema de la insercion masiva
            $usuario = new Usuario([
                'username' => $validated['username'],
                'nombre' => $validated['nombre'],
                'apellido' => $validated['apellido'],
                'telefono' => $validated['telefono'],
                'correo' => $validated['correo'],
                'idDireccion' => $direccion->idDireccion 
            ]);

            $usuario->password = Hash::make($validated['password']); // Hashear la contraseña
            $usuario->save();

            
            DocumentoIdentidad::create([
                'numeroDocumentoIdentidad' => $validated['numeroDocumentoIdentidad'],
                'idTipoDocumentoIdentidad' => $validated['idTipoDocumentoIdentidad'],
                'idUsuario' => $usuario->idUsuario 
            ]);

         $usuario->roles()->attach(1);  

            DB::commit(); // Confirma la transacción

            return redirect()->back()->with('success', 'Usuario registrado correctamente.');

        }
         catch (\Exception $e) {
            DB::rollBack(); 
            return redirect()->back()->withErrors(['error' => 'Error al registrar el usuario: ' . $e->getMessage()]);
    }
    }





}

