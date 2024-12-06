<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use View;

class ProductoController extends Controller
{
    protected $productos;

    public function __construct()
    {
        $this->productos = null;
    }

    public function getCategories()
    {
        $categorias = Categoria::all();
        return response()->json([
            'categorias' => $categorias
        ]);
    }

    public function setProductos($productos)
    {
        $this->productos = $productos;
    }
    
   
    public function filterProductsByCategory(Request $request)
    {
        $idCategory = $request->input('idCategoria'); 
        
        if (empty($idCategory)) {
            $this->productos = 
                Producto::with(['categoria', 'imagenes'])->get();
        } else {
            $this->productos = Producto::where('idCategoria', $idCategory)
                ->with(['categoria', 'imagenes'])
                ->get();
        }
        return response()->json([
            'productos' => $this->productos
        ]);
    }
    
    public function getProducts()
    {
        if (is_null($this->productos)) {
            $this->productos = 
                Producto::with(['categoria', 'imagenes'])->get();
        }
        
        return response()->json([
            'productos' => $this->productos
        ]);
    }

    public function getProductInfo(Request $request){
            $id = $request->input('idProducto');
        $producto = 
            Producto::with(['categoria', 'imagenes'])->findOrFail($id);
        $productosRelacionados = 
            Producto::where('idCategoria', $producto->idCategoria)
        ->where('idProducto', '!=', $id)
        ->with(['categoria', 'imagenes'])
        ->inRandomOrder() 
        ->take(3) 
        ->get();
        
        return response()->json([
            'producto' => $producto,
            'productosRelacionados' => $productosRelacionados
        ]);
    }

}
