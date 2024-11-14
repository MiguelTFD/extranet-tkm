<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\JsonResponse;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Distrito;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UbicacionController extends Controller
{
    public function getPaises()
    {
        $paises = Pais::all();
        return response()->json($paises);
    }


    public function getDepartamentos(Request $request)
    {
        $departamentos = Departamento::where('idPais', $request->pais_id)->get();
        return response()->json($departamentos);
    }

    // Mtodo para obtener las provincias por departamento
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

    public function newDirection(Request $request)
    {
        $validated = $request->validate([
            'direccionExacta' => 'required',
            'referencia' => 'required',
            'idDistrito' => 'required',
            'idTipoDireccion' => 'required'
        ]);
        $usuario = Auth::guard('usuario')->user();
        DB::beginTransaction();
        try {
            $direccion = Direccion::create([
                'direccionExacta' => $validated['direccionExacta'],
                'idDistrito' => $validated['idDistrito'],
                'referencia' => $validated['referencia'],
                'idTipoDireccion' => $validated['idTipoDireccion']
            ]);

            DB::table('direccionXusuario')->insert([
                'idUsuario' => $usuario->idUsuario,
                'idDireccion' => $direccion->idDireccion
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Dirección registrada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Error al registrar la dirección: ' . $e->getMessage()]);
        }
    }


    public function obtenerDirecciones()
    {
        $usuario = Auth::guard('usuario')->user();

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
        $direcciones = $usuario->direcciones()
            ->with(['distrito', 'distrito.provincia', 'distrito.provincia.departamento', 'distrito.provincia.departamento.pais'])
            ->get();

        $direccionesConNombres = $direcciones->map(function ($direccion) {
            return [
                'idDireccion' => $direccion->idDireccion,
                'direccionExacta' => $direccion->direccionExacta,
                'referencia' => $direccion->referencia,
                'distrito' => $direccion->distrito ? $direccion->distrito->nombreDistrito : null,
                'provincia' => $direccion->distrito && $direccion->distrito->provincia ? $direccion->distrito->provincia->nombreProvincia : null,
                'departamento' => $direccion->distrito && $direccion->distrito->provincia && $direccion->distrito->provincia->departamento ? $direccion->distrito->provincia->departamento->nombreDepartamento : null,
                'pais' => $direccion->distrito && $direccion->distrito->provincia && $direccion->distrito->provincia->departamento && $direccion->distrito->provincia->departamento->pais ? $direccion->distrito->provincia->departamento->pais->nombrePais : null,
            ];
        });
        return response()->json($direccionesConNombres);
    }

}
