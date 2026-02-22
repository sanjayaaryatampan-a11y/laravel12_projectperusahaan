<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailNota;
use Illuminate\Http\Request;

class DetailNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(DetailNota::with(['barang', 'nota'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nota_id' => 'required|exists:notas,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        $detailNota = DetailNota::create($validated);

        return response()->json($detailNota);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(DetailNota::with('barang', 'nota')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = DetailNota::findOrFail($id);
        $data->update($request->all());
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DetailNota::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
