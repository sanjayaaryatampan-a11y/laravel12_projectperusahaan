<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Nota::with('detailNotas')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_nota' => 'required|unique:notas',
            'tanggal' => 'required|date',
            'total_jumlah' => 'required|numeric',
        ]);

        $nota = Nota::create($validated);

        return response()->json($nota);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Nota::with('detailNotas')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->update($request->all());
        return response()->json($nota);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Nota::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
