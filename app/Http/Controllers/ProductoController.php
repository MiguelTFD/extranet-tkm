<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;


class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->idCategoria)) {
            $productos = Producto::with(['categoria', 'imagenes'])->get();
        } else {
            $productos = Producto::where('idCategoria', $request->idCategoria)
                ->with(['categoria', 'imagenes'])
                ->get();
        }
        session(['productos' => $productos]);
        $categorias = Categoria::all();
        session(['categorias' => $categorias]);
        return view('pages.productos');
    }
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'imagenes'])->findOrFail($id);
        return view('pages.detalleProducto', compact('producto'));
    }



}
