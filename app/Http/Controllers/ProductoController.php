<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;


class ProductoController extends Controller
{
    
/*
    public function index()
    {
        $rq = new Request();
        return $this->filtrarPorCategoria($rq);
    }

    public function show($id)
    {
        $producto = Producto::with(['categoria', 'imagenes'])->findOrFail($id);
        $productosRelacionados = Producto::where('idCategoria', $producto->idCategoria)
        ->where('idProducto', '!=', $id)
        ->with(['categoria', 'imagenes'])
        ->inRandomOrder() 
        ->take(3) 
        ->get();
        $categorias = Categoria::all();
        return view('pages.detalleProducto', compact('producto','categorias', 'productosRelacionados'));
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
        $categorias = Categoria::all();
        return view('pages.productos',compact('productos','categorias'));
    }
     */

    public function getCategories(){
        $categorias = Categoria::all();
        return response()->json([
            'categorias'=>$categorias
        ]);
    }
    
    public function filterProductsByCategory(Request $request){
        $id = $request->input('idCategoria'); 
        if(empty($id)){
            $productos = Producto::with(['categoria', 'imagenes'])->get();
        }else {
            $productos = Producto::where('idCategoria', $id)
                ->with(['categoria', 'imagenes'])
                ->get();
        }
            
        return response()->json([
            'productos' => $productos
        ]);
    }

}
