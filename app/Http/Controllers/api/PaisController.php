<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pais;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = DB::table('tb_pais')->get();
        return response()->json(['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $pais = new pais();
        $pais->pais_codi = Str::upper($request->pais_codi);
        $pais->pais_nomb = $request->pais_nomb;
        $pais->pais_capi = 0; 
        $pais->save();

        return json_encode(['pais' => $pais]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pais = Pais::find($id);
        return response()->json(['pais' => $pais]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $pais = Pais::find($id);
        if (!$pais) {
            return response()->json(['message' => 'Pais not found'], 404);
        }

        $request->validate([
            'pais_codi' => 'sometimes|string|size:3|unique:tb_pais,pais_codi,' . $id . ',pais_codi',
            'pais_nomb' => 'sometimes|string|max:255',
        ]);

        if ($request->has('pais_codi')) {
            $pais->pais_codi = strtoupper($request->pais_codi);
        }
        if ($request->has('pais_nomb')) {
            $pais->pais_nomb = $request->pais_nomb;
        }
       
        $pais->save();

        return response()->json(['pais' => $pais]);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais = Pais::find($id);
        if (!$pais) {
            return response()->json(['message' => 'Pais not found'], 404);
        }
        $pais->delete();
        $paises = DB::table('tb_pais')->get();

        return response()->json(['paises' => $paises, 'success' => true]);
    }
}