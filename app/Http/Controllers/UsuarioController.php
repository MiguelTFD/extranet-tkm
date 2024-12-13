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

    //Funcional 22-11-2024    
    public function createNewUser(Request $request)
    {
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
            'numeroDocumentoIdentidad' =>
            'required|unique:documentoIdentidad,numeroDocumentoIdentidad',
            'idTipoDocumentoIdentidad' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $direccion = Direccion::create([
                'idDistrito' => $validated['idDistrito'],
                'agencia' => $validated['agencia'],
                'sedeAgencia'=> $validated['sedeAgencia']
            ]);
            $usuario = new Usuario([
                'username' => $validated['username'],
                'nombre' => $validated['nombre'],
                'apellido' => $validated['apellido'],
                'telefono' => $validated['telefono'],
                'correo' => $validated['correo'],
            ]);
            $usuario->password = Hash::make($validated['password']);
            $usuario->save();
            DB::table('direccionXusuario')->insert([
                'idUsuario' => $usuario->idUsuario,
                'idDireccion' => $direccion->idDireccion
            ]);
            DocumentoIdentidad::create([
                'numeroDocumentoIdentidad' =>
                $validated['numeroDocumentoIdentidad'],
                'idTipoDocumentoIdentidad' =>
                $validated['idTipoDocumentoIdentidad'],
                'idUsuario' =>
                $usuario->idUsuario
            ]);
            $usuario->roles()->attach(1);
            DB::commit();
            Auth::login($usuario);
            return redirect()->route('home')->with('success', '¡Bienvenido ' . $usuario->nombre . '!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' =>
                'Error al registrar el usuario: ' . $e->getMessage()]);
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
 

    //Listo
    public function updateUser(Request $request)
    {
        $usuario = Auth::guard('usuario')->user();
        $validated = $request->validate([
            'username' =>
            'required|unique:usuario,username,' . Auth::id() . ',idUsuario',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' =>
            'required|email|unique:usuario,correo,' . Auth::id() .
                ',idUsuario',
            'numeroDocumentoIdentidad' =>
            'required|unique:documentoIdentidad,' .
                'numeroDocumentoIdentidad,' .
                Auth::user()->documentoIdentidad->idDocumentoIdentidad .
                ',idDocumentoIdentidad',
            'idTipoDocumentoIdentidad' =>
            'required|exists:tipoDocumentoIdentidad,' .
                'idTipoDocumentoIdentidad',
            'password' => 'nullable|min:8',
        ]);

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

        $usuario->documentoIdentidad->update([
            'numeroDocumentoIdentidad' =>
            $validated['numeroDocumentoIdentidad'],
            'idTipoDocumentoIdentidad' =>
            $validated['idTipoDocumentoIdentidad'],
        ]);
        return redirect()->route('showUserProfile')->with('success', '¡Datos actualizados correctamente!');
    }

    public function getUserAddress()
    {
        $paises = Pais::all();
        return view('auth.direcciones', compact('paises'));
    }

    public function getUserOrders()
    {
        $usuario = Auth::guard('usuario')->user();
        $pedidos = $usuario->ordenes()->orderBy('idOrdenCompra', 'desc')->get();
        return view('auth.pedidos', compact('pedidos'));
    }

    public function getOrder(Request $request)
    {
        $idOrdenCompra = $request->input('idOrdenCompra');
        $ordenCompra = OrdenCompra::with([
            'direccion.distrito.provincia.departamento.pais',
            'productos'
        ])->where('idOrdenCompra', $idOrdenCompra)->firstOrFail();

        $ordenCompra->informacionOrdenCompra = $ordenCompra->informacionOrdenCompra ?? 'No Aplica';

        $ordenCompra->instruccionEntrega = $ordenCompra->instruccionEntrega ?? 'No Aplica';

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

        $ordenCompra->informacionOrdenCompra = $ordenCompra->informacionOrdenCompra ?? 'No Aplica';
        $ordenCompra->instruccionEntrega = $ordenCompra->instruccionEntrega ?? 'No Aplica';
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
