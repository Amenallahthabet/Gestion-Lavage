<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RealisationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::get('/clients',[ClientController::class, 'index']);
Route::get('clients/index', [ClientController::class, 'index']);

Route::get('realisations/create', [RealisationController::class, 'create']);
Route::post('realisations/store', [RealisationController::class, 'store']);

