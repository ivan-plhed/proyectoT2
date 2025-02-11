<?php

use App\Http\Controllers\Api\CarritoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::options('carrito', function() {
    return response()
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

Route::delete('carrito/{id_cliente}', [CarritoController::class, 'destroy']);
Route::apiResource('carrito', CarritoController::class, ['GET, POST, PUT, DELETE, HEAD'])->middleware('auth:api');
