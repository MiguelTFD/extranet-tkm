<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    // Método para obtener los departamentos por país
    public function getDepartamentos(Request $request)
    {
        $departamentos = Departamento::where('idPais', $request->pais_id)->get();
        return response()->json($departamentos);
    }

    // Método para obtener las provincias por departamento
    public function getProvincias(Request $request)
    {
        $provincias = Provincia::where('idDepartamento', $request->departamento_id)->get();
        return response()->json($provincias);
    }

    // Método para obtener los distritos por provincia
    public function getDistritos(Request $request)
    {
        $distritos = Distrito::where('idProvincia', $request->provincia_id)->get();
        return response()->json($distritos);
    }
}
