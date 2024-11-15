<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Zonecoord;
use Illuminate\Http\Request;

class ZonecoordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Zonecoord::create($request->all());
            return response()->json(['message' => 'Coordenada registrada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error en el registro: ' . $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lastCoords = Zonecoord::select(
            'latitude as lat',
            'longitude as lng'
        )->where('zone_id', $id)->latest()->first();

        $vertice = Zonecoord::select(
            'latitude as lat',
            'longitude as lng'
        )->where('zone_id', $id)->get();

        return view('admin.zonecoords.create', compact('lastCoords','vertice'))->with('zone_id', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $zonecoord = Zonecoord::find($id);
            $zonecoord->delete();
            return response()->json(['message' => 'Coordenada eliminada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error en la eliminación: ' . $th->getMessage()], 500);
        }
    }
}
