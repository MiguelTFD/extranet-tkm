<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
       $producto = Producto::with(['categoria', 'imagenes'])->find($request->id);

       if(empty($producto))
           return redirect('/');

       Cart::add(
           $producto->idProducto,
           $producto->nombreProducto,
           1,
           $producto->precioUnitario,
           [
               'descuento' => $producto->descuento
           ]
       );
      return redirect()->back()->with("success","El producto ".$producto->nombreProducto." fue agregado a su carrito");
    }
}
