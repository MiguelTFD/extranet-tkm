<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use App\Mail\PedidosMailable;
use App\Models\OrdenCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendContactEmail(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        Mail::to('henry.management@thekingmoss.com')
            ->send(new ContactoMailable($request->all()));
        return redirect()->back()->with("success", "Se ha enviado el mensaje");
    }

    public function sendOrderRequestEmail($id)
    {
        $ordenCompra = OrdenCompra::with([
            'direccion.distrito.provincia.departamento.pais',
            'productos'
        ])->where('idOrdenCompra', $id)->firstOrFail();
        
        $ordenCompra->informacionOrdenCompra =
            $ordenCompra->informacionOrdenCompra ?? 'No Aplica';
        
        $ordenCompra->instruccionEntrega =
            $ordenCompra->instruccionEntrega ?? 'No Aplica';
        
        $direccion = $ordenCompra->direccion;
        
        $nombreDireccion =
            "{$direccion->
                distrito->
                provincia->
                departamento->
                pais->
                nombrePais
            }/" .
            "{$direccion->
                distrito->
                provincia->
                departamento->
                nombreDepartamento
            }/" .
            "{$direccion->
                distrito->
                provincia->
                nombreProvincia
            }/" .
            "{$direccion->
                distrito->
                nombreDistrito
            }";
        
        $agencia= $direccion->agencia;
        $sedeAgencia = $direccion->sedeAgencia;
        
        $datosOrdenCompra = [
            'idOrdenCompra' => $ordenCompra->idOrdenCompra,
            'fechaOrdenCompra' => $ordenCompra->fecha_orden_compra_formato,
            'nombreCliente' => $ordenCompra->
                usuario->
                nombre . $ordenCompra->
                usuario->apellido,
            'telefono' => $ordenCompra->usuario->telefono,
            'correo' => $ordenCompra->usuario->correo,
            'DocIdentidad' => $ordenCompra->usuario->documentoIdentidad->
            tipoDocumentoIdentidad->
            nombreTipoDocumentoIdentidad,
            'numDocIdentidad' => $ordenCompra->
            usuario->documentoIdentidad->numeroDocumentoIdentidad,
            'informacionOrdenCompra' => $ordenCompra->informacionOrdenCompra,
            'instruccionEntrega' => $ordenCompra->instruccionEntrega,
            'tipoEntrega' => $ordenCompra->tipoEntrega,
            'metodoPago' => $ordenCompra->metodoPago,
            'agencia' => $agencia,
            'sedeAgencia'=>$sedeAgencia,
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
