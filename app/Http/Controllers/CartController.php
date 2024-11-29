<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Cart;

class CartController extends Controller
{

public function add(Request $request)
{

    $producto = Producto::with(['categoria', 'imagenes'])->find($request->id);
    if (empty($producto)) {
        return redirect('/')->with('error', 'Producto no encontrado.');
    }

    Cart::add(
        $producto->idProducto,
        $producto->nombreProducto,
        1,
        $producto->precioUnitario,
        [
            'descuento' => $producto->descuento,
            'imagenes' => $producto->obtenerImagenUrl(),
            'descripcion' => $producto->descripcion
        ]
    );
    $this->countCart();
    return response()->json([
        'success' => true,
        'message' => "El producto " . $producto->nombreProducto . " fue agregado a su carrito"
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
