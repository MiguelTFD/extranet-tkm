<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;


class ProductoController extends Controller
{
    public function index()
    {
        return view('pages.productos');
    }
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'imagenes'])->findOrFail($id);
        
        // Obtener productos relacionados por categoría, excluyendo el producto actual
        $productosRelacionados = Producto::where('idCategoria', $producto->idCategoria)
        ->where('idProducto', '!=', $id)
        ->with(['categoria', 'imagenes'])
        ->inRandomOrder() // Orden aleatorio
        ->take(3) // Solo 3 productos
        ->get();
        return view('pages.detalleProducto', compact('producto', 'productosRelacionados'));
    }

    public function filtrarPorCategoria(Request $request)
    {
        $id = $request->input('idCategoria'); 
        if (empty($id)) {
            $productos = Producto::with(['categoria', 'imagenes'])->get();
        } else {
            $productos = Producto::where('idCategoria', $id)
                ->with(['categoria', 'imagenes'])
                ->get();
        }
        session(['productos' => $productos]);
        $categorias = Categoria::all();
        session(['categorias' => $categorias]);
        return view('pages.productos');
    }

}
