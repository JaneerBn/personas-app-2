<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pais;
use Illuminate\Support\Facades\DB;

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
        $pais->pais_nomb = $request->pais_nomb;
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
        $pais->pais_nomb = $request->name;
        $pais->pais_capi = $request->capi;
        $pais->save();

        $pais = DB::table('tb_pais')
            ->get();

        return json_encode(['pais' => $pais]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais = Pais::find($id);
        $pais->delete();
        $pais = DB::table('tb_pais')
            ->get();

        return json_encode(['paises' => $pais, 'success' => true]);
    }
}