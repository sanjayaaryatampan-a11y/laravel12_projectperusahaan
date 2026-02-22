<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success'=> true,
            'message'=> 'Daftar barang',
            'data'=> Barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
        ]);

        $barang = Barang::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Barang Berhasil Ditambahkan',
            'data' => $barang
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $barang = Barang::find($id);

       if(!$barang){
        return response()->json([
            'success'=>false,
            'message'=>'barang tidak ditemukan',
        ], 404);
       }

       return response()->json([
        'success'=> true,
        'message'=> 'Detail barang',
        'data'=> $barang
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $barang = Barang::find($id);

    if (!$barang) {
        return response()->json([
            'success' => false,
            'message' => 'Barang tidak ditemukan'
        ], 404);
    }

    $validated = $request->validate([
        'kd_barang'   => 'required',
        'nama_barang' => 'required',
        'harga'       => 'required|numeric'
    ]);

    $barang->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Barang berhasil diupdate',
        'data'    => $barang
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $barang = Barang::find($id);

    if (!$barang) {
        return response()->json([
            'success' => false,
            'message' => 'Barang tidak ditemukan'
        ], 404);
    }

    $barang->delete();

    return response()->json([
        'success' => true,
        'message' => 'Barang berhasil dihapus'
    ]);
}
}
