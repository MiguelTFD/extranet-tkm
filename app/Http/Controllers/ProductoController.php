<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'imagenes'])->get();
        session(['productos' => $productos]); 
        return view('pages.productos');
    }
    public function show($id)
    {
        // Obtener el producto por su ID con sus relaciones
        $producto = Producto::with(['categoria', 'imagenes'])->findOrFail($id);
        
        // Retornar la vista de detalles del producto
        return view('pages.detalleProducto', compact('producto'));
    }
}
