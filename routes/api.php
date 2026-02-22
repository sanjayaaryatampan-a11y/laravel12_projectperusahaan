<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotaController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\DetailNotaController;
use Illuminate\Http\Request;

Route::apiResource('nota', NotaController::class);
Route::apiResource('barang', BarangController::class);
Route::apiResource('detail-nota', DetailNotaController::class);
