<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TipoDocumentoIdentidad;
use App\Models\Direccion;
use App\Models\TipoDireccion;
use App\Models\DocumentoIdentidad;
use App\Models\OrdenCompra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Pais;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function createNewUser(Request $request)
{
    try {
        // Validación con mensajes personalizados
        $validated = $request->validate([
            'username' => 'required|unique:usuario,username',
            'password' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:usuario,correo',
            'idDistrito' => 'required',
            'agencia' => 'required',
            'sedeAgencia'=>'required',
            'numeroDocumentoIdentidad' => 'required|unique:documentoIdentidad,numeroDocumentoIdentidad',
            'idTipoDocumentoIdentidad' => 'required',
        ], [
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'correo.unique' => 'El correo electrónico ya está registrado.',
            'numeroDocumentoIdentidad.unique' => 'El número de documento de identidad ya está registrado.',
            'required' => 'El campo :attribute es obligatorio.',
        ]);

        DB::beginTransaction();

        // Creación de Dirección
        $direccion = Direccion::create([
            'idDistrito' => $validated['idDistrito'],
            'agencia' => $validated['agencia'],
            'sedeAgencia'=> $validated['sedeAgencia']
        ]);

        // Creación del Usuario
        $usuario = new Usuario([
            'username' => $validated['username'],
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'telefono' => $validated['telefono'],
            'correo' => $validated['correo'],
        ]);
        $usuario->password = Hash::make($validated['password']);
        $usuario->save();

        // Relación Dirección y Usuario
        DB::table('direccionXusuario')->insert([
            'idUsuario' => $usuario->idUsuario,
            'idDireccion' => $direccion->idDireccion
        ]);

        // Creación del Documento de Identidad
        DocumentoIdentidad::create([
            'numeroDocumentoIdentidad' => $validated['numeroDocumentoIdentidad'],
            'idTipoDocumentoIdentidad' => $validated['idTipoDocumentoIdentidad'],
            'idUsuario' => $usuario->idUsuario
        ]);

        // Asignar rol al usuario
        $usuario->roles()->attach(1);

        DB::commit();
        Auth::login($usuario);

        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'data' => $usuario
        ], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Manejo de errores de validación
        return response()->json([
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        DB::rollBack();
        // Manejo de otros errores
        return response()->json([
            'error' => 'Error al registrar el usuario: ' . $e->getMessage()
        ], 500);
    }
}


    public function showUserProfilePage()
    {
        $usuario = Auth::guard('usuario')->user();
        $documentoIdentidad = $usuario->documentoIdentidad; 
        $tiposDocumento = TipoDocumentoIdentidad::all();
        
        return view(
            'auth.perfil',
            compact('usuario', 'documentoIdentidad', 'tiposDocumento')
        );
    }

    public function updateUser(Request $request)
{
    try {
        $usuario = Auth::guard('usuario')->user();

        if (!$usuario) {
            return back()->withErrors([
                'usuario' => 'El usuario autenticado no existe.',
            ]);
        }
        $validated = $request->validate([
            'username' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'numeroDocumentoIdentidad' => 'required',
            'idTipoDocumentoIdentidad' => 'required|exists:tipoDocumentoIdentidad,idTipoDocumentoIdentidad',
            'password' => 'nullable|min:8',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'correo.email' => 'El correo debe ser una dirección válida.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $usernameExistente = Usuario::where('username', $validated['username'])
            ->where('idUsuario', '!=', $usuario->idUsuario)
            ->first();

        if ($usernameExistente) {
            return back()->withErrors([
                'username' => 'El nombre de usuario ya está registrado por otro usuario.',
            ]);
        }

        $correoExistente = Usuario::where('correo', $validated['correo'])
            ->where('idUsuario', '!=', $usuario->idUsuario)
            ->first();

        if ($correoExistente) {
            return back()->withErrors([
                'correo' => 'El correo electrónico ya está registrado por otro usuario.',
            ]);
        }

        $documentoExistente = DocumentoIdentidad::where('numeroDocumentoIdentidad', $validated['numeroDocumentoIdentidad'])
            ->where('idDocumentoIdentidad', '!=', $usuario->documentoIdentidad->idDocumentoIdentidad)
            ->first();

        if ($documentoExistente) {
            return back()->withErrors([
                'numeroDocumentoIdentidad' => 'El número de documento de identidad ya está registrado por otro usuario.',
            ]);
        }

        DB::beginTransaction();

        $usuario->update([
            'username' => $validated['username'],
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'telefono' => $validated['telefono'],
            'correo' => $validated['correo'],
        ]);

        if (!empty($validated['password'])) {
            $usuario->password = bcrypt($validated['password']);
            $usuario->save();
        }

        if (!$usuario->documentoIdentidad) {
            return back()->withErrors([
                'documentoIdentidad' => 'El documento de identidad no está asociado al usuario.',
            ]);
        }

        $usuario->documentoIdentidad->update([
            'numeroDocumentoIdentidad' => $validated['numeroDocumentoIdentidad'],
            'idTipoDocumentoIdentidad' => $validated['idTipoDocumentoIdentidad'],
        ]);

        DB::commit();

        return redirect()
            ->route('showUserProfile')
            ->with('success', '¡Datos actualizados correctamente!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Manejo de errores de validación
        return back()->withErrors($e->errors());
    } catch (\Exception $e) {
        DB::rollBack();
        // Manejo de otros errores
        return back()->withErrors([
            'error' => 'Error al actualizar los datos del usuario: ' . $e->getMessage(),
        ]);
    }
}




    public function getUserAddress()
    {
        $paises = Pais::all();
        return view('auth.direcciones', compact('paises'));
    }

    public function getUserOrders()
    {
        $usuario = Auth::guard('usuario')->user();
        
        $pedidos = $usuario->ordenes()
        ->orderBy('idOrdenCompra', 'desc')->get();
        
        return view('auth.pedidos', compact('pedidos'));
    }

    public function getOrder(Request $request)
    {
        $idOrdenCompra = $request->input('idOrdenCompra');
        $ordenCompra = OrdenCompra::with([
            'direccion.distrito.provincia.departamento.pais',
            'productos'
        ])->where('idOrdenCompra', $idOrdenCompra)->firstOrFail();
        
        $ordenCompra->informacionOrdenCompra = $ordenCompra->
            informacionOrdenCompra ?? 'No Aplica';
       
        $ordenCompra->instruccionEntrega = $ordenCompra->
            instruccionEntrega ?? 'No Aplica';
        
        $direccion = $ordenCompra->direccion;
        
        $nombreDireccion =
            "{$direccion->distrito->provincia->departamento->pais->nombrePais}/" .
            "{$direccion->distrito->provincia->departamento->nombreDepartamento}/" .
            "{$direccion->distrito->provincia->nombreProvincia}/" .
            "{$direccion->distrito->nombreDistrito}";
        
        $agencia= $direccion->agencia;
        $sedeAgencia = $direccion->sedeAgencia;
        
        $datosOrdenCompra = [
            'idOrdenCompra' => $ordenCompra->idOrdenCompra,
            'fechaOrdenCompra' => $ordenCompra->fecha_orden_compra_formato,
            'informacionOrdenCompra' => $ordenCompra->informacionOrdenCompra,
            'instruccionEntrega' => $ordenCompra->instruccionEntrega,
            'tipoEntrega' => $ordenCompra->tipoEntrega,
            'metodoPago' => $ordenCompra->metodoPago,
            'agencia' => $agencia,
            'sedeAgencia'=> $sedeAgencia,
            'direccion' => $nombreDireccion,
            'estadoOrdenCompra' => $ordenCompra->estadoOrdenCompra,
            'precioTotal' => $ordenCompra->precioTotal,
            'detalles' => []
        ];

        foreach ($ordenCompra->productos as $producto) {
            $datosOrdenCompra['detalles'][] = [
                'nombreProducto' => $producto->nombreProducto,
                'idCategoria' => $producto->idCategoria,
                'cantidad' => $producto->pivot->cantidad,
            ];
        }

        return view('auth.detallePedido', compact('datosOrdenCompra'));
    }


    public function generatePdf(Request $request)
    {

        $idOrdenCompra = $request->input('idOrdenCompra');
        $ordenCompra = OrdenCompra::with([
            'direccion.distrito.provincia.departamento.pais',
            'productos'
        ])->where('idOrdenCompra', $idOrdenCompra)->firstOrFail();
        
        $ordenCompra->informacionOrdenCompra = $ordenCompra
                    ->informacionOrdenCompra ?? 'No Aplica';
        
        $ordenCompra->instruccionEntrega = $ordenCompra
                    ->instruccionEntrega ?? 'No Aplica';
        
        $direccion = $ordenCompra->direccion;
        
        $nombreDireccion =
            "{$direccion->distrito->provincia->departamento->pais->nombrePais}/" .
            "{$direccion->distrito->provincia->departamento->nombreDepartamento}/" .
            "{$direccion->distrito->provincia->nombreProvincia}/" .
            "{$direccion->distrito->nombreDistrito}";
        
        $agencia= $direccion->agencia;
        
        $sedeAgencia = $direccion->sedeAgencia;
        
        $datosOrdenCompra = [
            'idOrdenCompra' => $ordenCompra->idOrdenCompra,
            'fechaOrdenCompra' => $ordenCompra->fecha_orden_compra_formato,
            'informacionOrdenCompra' => $ordenCompra->informacionOrdenCompra,
            'instruccionEntrega' => $ordenCompra->instruccionEntrega,
            'tipoEntrega' => $ordenCompra->tipoEntrega,
            'metodoPago' => $ordenCompra->metodoPago,
            'agencia' => $agencia,
            'sedeAgencia' => $sedeAgencia,
            'direccion' => $nombreDireccion,
            'estadoOrdenCompra' => $ordenCompra->estadoOrdenCompra,
            'precioTotal' => $ordenCompra->precioTotal,
            'detalles' => []
        ];
        
        foreach ($ordenCompra->productos as $producto) {
            $datosOrdenCompra['detalles'][] = [
                'nombreProducto' => $producto->nombreProducto,
                'cantidad' => $producto->pivot->cantidad,
            ];
        }
        
        $pagoElegido = $ordenCompra->metodoPago;
        
        $pagoEnYape = '
            Número de destino: +51 983 929 015<br>
            Destinatario: Henry Obed Cholan Romero<br>
        ';
        
        $pagoEnPlin = '
            Número de destino: +51 983 929 015<br>
            Destinatario: Henry Obed Cholan Romero<br>
        ';
        
        $depositoBancoNacion = '
            <p>Cuenta de ahorros en Soles Banco de la Nación: 04-487-189109</p>
            <p>Titular: Henry Obed Cholan Romero</p>
            <small><i class="fa-solid fa-circle-info"></i>' .
            ' Depósito en agente</small>
        ';
        
        $transferenciaBBVA = '
            <p>Número de cuenta BBVA Soles: 0011-0628-0200241090</p>
            <p>Titular: Henry Obed Cholan Romero</p>
            <small><i class="fa-solid fa-circle-info"></i>' .
            ' ¡SOLO TRANSFERENCIA DIGITAL!</small>
        ';
        
        $transferenciaBCP = '
            <p>Número de cuenta BCP Soles: 19132941359098</p>
            <p>Titular: Henry Obed Cholan Romero</p>
            <small><i class="fa-solid fa-circle-info"></i>' .
            ' ¡SOLO TRANSFERENCIA DIGITAL!</small>
        ';
        
        switch ($pagoElegido) {
            case 'Pago en yape':
                $metodoPagoLayout = $pagoEnYape;
                break;
            case 'Pago con Plin':
                $metodoPagoLayout = $pagoEnPlin;
                break;
            case 'Deposito en Banco de la Nacion':
                $metodoPagoLayout = $depositoBancoNacion;
                break;
            case 'Transferencia digital BCP':
                $metodoPagoLayout = $transferenciaBCP;
                break;
            case 'Transferencia digital BBVA':
                $metodoPagoLayout = $transferenciaBBVA;
                break;
            default:
                $metodoPagoLayout = '<p>Algo salió mal :(</p>';
                break;
        }
                $usuario = Auth::guard('usuario')->user();
        $pdf = Pdf::loadView(
            'auth.pdfPedidos',
            compact('datosOrdenCompra', 'metodoPagoLayout', 'usuario')
        );
        return $pdf->stream();
    }
}
