<?php

namespace App\Http\Controllers;

use App\Mail\PedidosMailable;
use App\Models\OrdenCompra;
use App\Models\Pais;
use App\Models\TipoDireccion;
use App\Models\TipoDocumentoIdentidad;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrdenCompraController extends Controller
{
    public function __construct(){
        $this->middleware('auth:usuario');
    }


    public function showOrderRequestPage(){
        $paises = Pais::all();
        $tiposDocumento = TipoDocumentoIdentidad::all();
        $tiposDireccion = TipoDireccion::all(); // Para llenar el select de tipo dirección
        return view('pages.registrarOrdenCompra', compact('tiposDocumento',  'tiposDireccion','paises'));
    }

    public function crearOrdenCompra(Request $request)
    {
        $validatedData = $request->validate([
            'direcciones' => 'required|exists:direccion,idDireccion',
            'tipoEntrega' => 'nullable|string|max:30',
            'pago' => 'nullable|string|max:60',
            'estadoOrdenCompra' => 'nullable|string|max:60',
            'informacionOrdenCompra' => 'nullable|string',
            'instruccionEntrega' => 'nullable|string',
            'precioTotal'=>'nullable|string',
        ]);
        $usuario = Auth::guard('usuario')->user();
        try {
            DB::beginTransaction();

            $ordenCompra = OrdenCompra::create([
                'idUsuario' => $usuario->idUsuario,
                'idDireccion' => $validatedData['direcciones'],
                'tipoEntrega' => $validatedData['tipoEntrega'] ?? 'Delivery',
                'metodoPago' => $validatedData['pago'] ?? null,
                'precioTotal' => $validatedData['precioTotal'] ?? null,
                'estadoOrdenCompra' => $validatedData['estadoOrdenCompra'] ?? 'Generada',
                'informacionOrdenCompra' => $validatedData['informacionOrdenCompra'] ?? null,
                'instruccionEntrega' => $validatedData['instruccionEntrega'] ?? null,
            ]);
            $productos = Cart::content();
            foreach ($productos as $producto) {
                $ordenCompra->productos()->attach($producto->id, [
                    'cantidad' => $producto->qty,
                ]);
            }
            DB::commit();
            Cart::destroy();
            $this->verDetallePedido($ordenCompra->idOrdenCompra);
            return redirect('/verPedidos')->with('success', 'Compra realizada con éxito.');
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Error al crear la orden de compra.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function verDetallePedido($idPedido)
    {


        $ordenCompra = OrdenCompra::with([
            'direccion.distrito.provincia.departamento.pais', // Relación encadenada
            'productos'
        ])->where('idOrdenCompra', $idPedido)->firstOrFail();


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
            'nombreCliente' => $ordenCompra->usuario->nombre.$ordenCompra->usuario->apellido,
            'telefono' => $ordenCompra->usuario->telefono,
            'correo' => $ordenCompra->usuario->correo,
            'DocIdentidad' => $ordenCompra->usuario->documentoIdentidad->tipoDocumentoIdentidad->nombreTipoDocumentoIdentidad,
            'numDocIdentidad' => $ordenCompra->usuario->documentoIdentidad->numeroDocumentoIdentidad,
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
                'idCategoria' => $producto->idCategoria,
                'cantidad' => $producto->pivot->cantidad,
            ];
        }

        Mail::to('henry.management@thekingmoss.com')
            ->send(new PedidosMailable($datosOrdenCompra));



    }
}
