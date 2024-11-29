<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmailController;

class OrdenCompraController extends Controller
{
    public function __construct(){
        $this->middleware('auth:usuario');
    }

    public function createOrderRequest(Request $request)
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
                'estadoOrdenCompra' => 
                    $validatedData['estadoOrdenCompra'] ?? 'Generada',
                'informacionOrdenCompra' =>
                    $validatedData['informacionOrdenCompra'] ?? null,
                'instruccionEntrega' 
                    => $validatedData['instruccionEntrega'] ?? null,
            ]);
            $productos = Cart::content();
            foreach ($productos as $producto) {
                $ordenCompra->productos()->attach($producto->id, [
                    'cantidad' => $producto->qty,
                ]);
            }
            DB::commit();
            Cart::destroy();
            $emailController = new EmailController();
            $emailController->
                sendOrderRequestEmail($ordenCompra->idOrdenCompra);
            return redirect('/getUserOrders')->
                with('success', 'Compra realizada con éxito.');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error al crear la orden de compra.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
