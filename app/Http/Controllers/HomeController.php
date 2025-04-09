<?php
namespace App\Http\Controllers;

 
use App\Models\Producto;

use Illuminate\Http\Request;
//idk code for new dadasda asdaasd
class HomeController extends Controller
{
    public function index()
    {
        if (empty($id)) {
            $productos = Producto::with(['categoria', 'imagenes'])->get();
        } else {
            $productos = Producto::where('idCategoria', $id)
                ->with(['categoria', 'imagenes'])
                ->get();
        }
        session(['productos' => $productos]);
        return view('pages.home');

    }
}

