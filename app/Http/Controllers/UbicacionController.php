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
        $departamentos = Departamento::where(
            'idPais', 
            $request->pais_id
        )->get();
        return response()->json($departamentos);
    }

    public function getProvincias(Request $request)
    {
        $provincias = Provincia::where(
            'idDepartamento', 
            $request->departamento_id
        )->get();
        return response()->json($provincias);
    }

    public function getDistritos(Request $request)
    {
        $distritos = Distrito::where(
            'idProvincia', 
            $request->provincia_id
        )->get();
        return response()->json($distritos);
    }

    public function newDirection(Request $request)
    {
        $validated = $request->validate([
            'idDistrito' => 'required',
            'agencia' => 'required',
            'sedeAgencia'=>'required'
        ]);
        $usuario = Auth::guard('usuario')->user();
        DB::beginTransaction();
        try {
            $direccion = Direccion::create([
                'idDistrito' => $validated['idDistrito'],
                'agencia' => $validated['agencia'],
                'sedeAgencia'=>$validated['sedeAgencia']
            ]);
            DB::table('direccionXusuario')->insert([
                'idUsuario' => $usuario->idUsuario,
                'idDireccion' => $direccion->idDireccion
            ]);
            DB::commit();
            return redirect()->back()->with(
                'success', 
                'Dirección registrada correctamente.'
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                'error' => 'Error al registrar la dirección: ' 
                . $e->getMessage()
            ]);
        }
    }

    public function obtenerDirecciones()
    {
        $usuario = Auth::guard('usuario')->user();
        if (!$usuario) {
            return response()->json([
                'error' => 'Usuario no autenticado'
            ], 401);
        }
        $direcciones = $usuario->direcciones()
            ->with([
                'distrito', 
                'distrito.provincia', 
                'distrito.provincia.departamento', 
                'distrito.provincia.departamento.pais'
            ])->get();
        $direccionesConNombres = $direcciones->map(function ($direccion) {
            return [
                'idDireccion' => $direccion->idDireccion,
                'agencia' => $direccion->agencia,
                'sedeAgencia'=>$direccion->sedeAgencia,
                'distrito' => $direccion->distrito ? 
                    $direccion->distrito->nombreDistrito : null,
                    'provincia' => $direccion->distrito && 
                    $direccion->distrito->provincia ? 
                    $direccion->distrito->provincia->nombreProvincia : null,
                    'departamento' => $direccion->distrito && 
                    $direccion->distrito->provincia && 
                    $direccion->distrito->provincia->departamento ? 
                    $direccion->distrito->
                        provincia->departamento->nombreDepartamento : null,
                        'pais' => $direccion->distrito && 
                        $direccion->distrito->provincia && 
                        $direccion->distrito->provincia->departamento 
                        && $direccion->distrito->provincia->departamento
                        ->pais ? $direccion->distrito->provincia
                    ->departamento->pais->nombrePais : null,
            ];
        });
        return response()->json($direccionesConNombres);
    }

    public function getDireccion($id) 
    {
        $direccion = Direccion::with([
            'distrito', 
            'distrito.provincia', 
            'distrito.provincia.departamento', 
            'distrito.provincia.departamento.pais'
        ])->findOrFail($id);
        
        return response()->json([
            'idDireccion' => $direccion->idDireccion,
            'agencia' => $direccion->agencia,
            'sedeAgencia' => $direccion->sedeAgencia,
            'distrito' => $direccion->distrito->idDistrito,
            'provincia' => $direccion->distrito->provincia->idProvincia,
            'departamento' => $direccion->distrito->
                provincia->departamento->idDepartamento,
            'pais' => $direccion->distrito->
                provincia->departamento->pais->idPais,
        ]);
    }
    
    public function updateDirection(Request $request) 
    {
        $validated = $request->validate([
            'idDireccion' => 'required|exists:direccion,idDireccion',
            'agencia' => 'required',
            'sedeAgencia' =>'required',
            'idDistrito' => 'required'
        ]);
        
        try {
            $direccion = Direccion::findOrFail($validated['idDireccion']);
            $direccion->update($validated);
            return redirect()->back()->with(
                'success', 
                'Dirección actualizada correctamente.'
            );
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'error' => 'Error al actualizar la dirección: ' . 
                $e->getMessage()
            ]);
        }
    }
}
