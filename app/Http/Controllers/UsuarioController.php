<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TipoDocumentoIdentidad;
use App\Models\Direccion;
use App\Models\Distrito;
use App\Models\TipoDireccion;
use App\Models\DocumentoIdentidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    
    public function create()
    {
        $tiposDocumento = TipoDocumentoIdentidad::all(); 
        $distritos = Distrito::all(); 
        $tiposDireccion = TipoDireccion::all(); // Para llenar el select de tipo dirección
        return view('pages.create', compact('tiposDocumento', 'distritos', 'tiposDireccion'));
    }

    public function store(Request $request)
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
            'idDistrito' => 'required', // Asumimos que viene desde un select
            'idTipoDireccion' => 'required', // Asumimos que viene desde un select
            'numeroDocumentoIdentidad' => 'required|unique:documentoIdentidad,numeroDocumentoIdentidad',
            'idTipoDocumentoIdentidad' => 'required' // Asumimos que viene desde un select
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

            // Crear el usuario
            $usuario = Usuario::create([
                'username' => $validated['username'],
                'password' => Hash::make($validated['password']), // Hashear la contraseña
                'nombre' => $validated['nombre'],
                'apellido' => $validated['apellido'],
                'telefono' => $validated['telefono'],
                'correo' => $validated['correo'],
                'idDireccion' => $direccion->idDireccion // Asignar la dirección creada
            ]);

            // Crear el documento de identidad y asociarlo al usuario
            DocumentoIdentidad::create([
                'numeroDocumentoIdentidad' => $validated['numeroDocumentoIdentidad'],
                'idTipoDocumentoIdentidad' => $validated['idTipoDocumentoIdentidad'],
                'idUsuario' => $usuario->idUsuario // Relacionar con el usuario creado
            ]);

            // Asignar el rol por defecto (idRol = 1)
         $usuario->roles()->attach(1);  // Relación Many-to-Many a través de usuarioRol

            DB::commit(); // Confirma la transacción

            return redirect()->back()->with('success', 'Usuario registrado correctamente.');

        }
         catch (\Exception $e) {
            DB::rollBack(); // Deshace la transacción en caso de error
            return redirect()->back()->withErrors(['error' => 'Error al registrar el usuario: ' . $e->getMessage()]);
    }
    }

    



}

