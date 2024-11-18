<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\OrdenCompra;
use App\Models\DocumentoIdentidad;
use App\Models\TipoDocumentoIdentidad;
use App\Models\TipoDireccion;
use App\Models\Direccion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class usuarioDashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth:usuario');
    }

    public function mostrarDashboard(){
        $usuario = Auth::guard('usuario')->user();
        $documentoIdentidad = $usuario->documentoIdentidad;
        $tiposDocumento = TipoDocumentoIdentidad::all();
        return view('auth.perfil', compact('usuario', 'documentoIdentidad', 'tiposDocumento'));        
    } 

    public function update(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'username' => 'required|unique:usuario,username,' . Auth::id() . ',idUsuario',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email|unique:usuario,correo,' . Auth::id() . ',idUsuario',
            'numeroDocumentoIdentidad' => 'required|unique:documentoIdentidad,numeroDocumentoIdentidad,' . Auth::user()->documentoIdentidad->idDocumentoIdentidad . ',idDocumentoIdentidad',
            'idTipoDocumentoIdentidad' => 'required|exists:tipoDocumentoIdentidad,idTipoDocumentoIdentidad',
                    'password' => 'nullable|min:8', 
        ]);
        $usuario = Auth::guard('usuario')->user();

        $usuario->update([
            'username' => $validated['username'],
            'nombre' => $validated['nombre'],
            'apellido' => $validated['apellido'],
            'telefono' => $validated['telefono'],
            'correo' => $validated['correo'],
        ]);

    if (!empty($validated['password'])) {
        $usuario->password = bcrypt($validated['password']); // Hashea la contraseña
        $usuario->save(); // Guarda los cambios
    }


        $usuario->documentoIdentidad->update([
            'numeroDocumentoIdentidad' => $validated['numeroDocumentoIdentidad'],
            'idTipoDocumentoIdentidad' => $validated['idTipoDocumentoIdentidad'],
        ]);
       return redirect()->route('verPerfil')->with('success', '¡Datos actualizados correctamente!');
    }
    
    public function actualizarDir(Request $request)
    {
    $validatedData = $request->validate([
        'pais' => 'required',
        'departamento' => 'required',
        'provincia' => 'required',
        'idDistrito' => 'required',
        'direccionExacta' => 'required|string|max:255',
        'referencia' => 'nullable|string|max:255',
    ]);

    $direccion = Direccion::findOrFail($request->idDireccion);
    $direccion->update($validatedData);

    return redirect()->back()->with('success', 'Dirección actualizada correctamente.');
    }

    public function mostrarDirecciones(){
        $paises = Pais::all();
        $tiposDireccion = TipoDireccion::all(); 
        return view('auth.direcciones',compact('paises','tiposDireccion'));
    }
    public function mostrarPedidos(){
        $usuario = Auth::guard('usuario')->user();
        $pedidos = $usuario->ordenes()->get();
        return view('auth.pedidos',compact('pedidos'));
    }

    public function mostrarOrdenCompra(Request $request)
{
    $idOrdenCompra = $request->input('idOrdenCompra');

  
    $ordenCompra = OrdenCompra::with([
        'direccion.distrito.provincia.departamento.pais', // Relación encadenada
        'productos'
    ])->where('idOrdenCompra', $idOrdenCompra)->firstOrFail();

 
    $ordenCompra->informacionOrdenCompra = $ordenCompra->informacionOrdenCompra ?? 'No Aplica';
    $ordenCompra->instruccionEntrega = $ordenCompra->instruccionEntrega ?? 'No Aplica';

    $direccion = $ordenCompra->direccion;
    $nombreDireccion = "{$direccion->distrito->provincia->departamento->pais->nombrePais}/" .
                       "{$direccion->distrito->provincia->departamento->nombreDepartamento}/" .
                       "{$direccion->distrito->provincia->nombreProvincia}/" .
                       "{$direccion->distrito->nombreDistrito}";

    $direccionExacta= $direccion->direccionExacta;
    $referencia = $direccion->referencia;

    $datosOrdenCompra = [
        'idOrdenCompra' => $ordenCompra->idOrdenCompra,
        'fechaOrdenCompra' => $ordenCompra->fecha_orden_compra_formato,
        'informacionOrdenCompra' => $ordenCompra->informacionOrdenCompra,
        'instruccionEntrega' => $ordenCompra->instruccionEntrega,
        'tipoEntrega' => $ordenCompra->tipoEntrega,
        'metodoPago' => $ordenCompra->metodoPago,
        'direccionExacta' => $direccionExacta,
        'referencia' => $referencia, 
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

    return view('auth.detallePedido', compact('datosOrdenCompra'));
}


    public function generarPdf(Request $request){
    $idOrdenCompra = $request->input('idOrdenCompra');


    $ordenCompra = OrdenCompra::with([
        'direccion.distrito.provincia.departamento.pais', 
        'productos'
    ])->where('idOrdenCompra', $idOrdenCompra)->firstOrFail();

    $ordenCompra->informacionOrdenCompra = $ordenCompra->informacionOrdenCompra ?? 'No Aplica';
    $ordenCompra->instruccionEntrega = $ordenCompra->instruccionEntrega ?? 'No Aplica';

    $direccion = $ordenCompra->direccion;
    $nombreDireccion = "{$direccion->distrito->provincia->departamento->pais->nombrePais}/" .
                       "{$direccion->distrito->provincia->departamento->nombreDepartamento}/" .
                       "{$direccion->distrito->provincia->nombreProvincia}/" .
                       "{$direccion->distrito->nombreDistrito}";

    $direccionExacta= $direccion->direccionExacta;
    $referencia = $direccion->referencia;

    $datosOrdenCompra = [
        'idOrdenCompra' => $ordenCompra->idOrdenCompra,
        'fechaOrdenCompra' => $ordenCompra->fecha_orden_compra_formato,
        'informacionOrdenCompra' => $ordenCompra->informacionOrdenCompra,
        'instruccionEntrega' => $ordenCompra->instruccionEntrega,
        'tipoEntrega' => $ordenCompra->tipoEntrega,
        'metodoPago' => $ordenCompra->metodoPago,
        'direccionExacta' => $direccionExacta,
        'referencia' => $referencia, 
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

 
    
    
        $pagoElegido= $ordenCompra->metodoPago;
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
            <small><i class="fa-solid fa-circle-info"></i> Depósito en agente</small>
        ';

        $transferenciaBBVA = '
            <p>Número de cuenta BBVA Soles: 0011-0628-0200241090</p>
            <p>Titular: Henry Obed Cholan Romero</p>
            <small><i class="fa-solid fa-circle-info"></i> ¡SOLO TRANSFERENCIA DIGITAL!</small>
        ';

        $transferenciaBCP = '
            <p>Número de cuenta BCP Soles: 19132941359098</p>
            <p>Titular: Henry Obed Cholan Romero</p>
            <small><i class="fa-solid fa-circle-info"></i> ¡SOLO TRANSFERENCIA DIGITAL!</small>
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
        $pdf =Pdf::loadView('auth.pdfPedidos', compact('datosOrdenCompra','metodoPagoLayout','usuario'));
        return $pdf->stream(); 
    }

}
