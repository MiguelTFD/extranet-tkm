<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Cart;

class CartController extends Controller
{

public function add(Request $request)
{
    // Parse JSON input
    $data = $request->json()->all();
    
    $producto = Producto::with(['categoria', 'imagenes'])
        ->find($data['id']);
    
    if (empty($producto)) {
        return response()->json([
            'success' => false, 
            'message' => 'Producto no encontrado.'
        ], 404);
    }
    
    // Use the cantidad from JSON data, default to 1 if not provided
    $qty = $data['cantidad'] ?? 1;
    if ($qty < 1) {
        $qty = 1;
    }
    
    Cart::add(
        $producto->idProducto,
        $producto->nombreProducto,
        $qty,
        $producto->precioUnitario,
        [
            'descuento' => $producto->descuento,
            'imagenes' => $producto->obtenerImagenUrl(),
            'descripcion' => $producto->descripcion
        ]
    );
    
    // Get updated cart count
    $cartCount = Cart::count();
    
    return response()->json([
        'success' => true,
        'message' => "El producto " . $producto->nombreProducto . " fue agregado a su carrito",
        'cantidadCarro' => $cartCount
    ]);
}
    public function countCart(){
       $totalCarro =  Cart::count();
        return response()->json([
            'cantidadCarro' => $totalCarro
        ]);
    }

    public function remove(Request $request){
        Cart::remove($request->rowId);
    return redirect()->back()->with("success", "El producto  fue eliminado");
    }
    
    public function clear(){
        Cart::destroy();
        return redirect()->back()->with("success", "Se ha limpiado el carrito");
    }
    
    public function increaseQuantity(Request $request){
      $item =  Cart::get($request->rowId);
      $qty = $item->qty+1;
      Cart::update($request->rowId,$qty);
        return redirect()->back();
    }

    public function decreaseQuantity(Request $request){
      $item=  Cart::get($request->rowId);
      $qty = $item ->qty-1;
      Cart::update($request->rowId,$qty);
      return redirect()->back();
    }

}
