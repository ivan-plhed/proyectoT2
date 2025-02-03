<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $productos = Producto::all();
    return view('producto.index', compact('productos'));
});

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('carrito', [CarritoController::class, 'carrito'])->middleware('auth');

Route::middleware('role', ['role:admin'])

Route::resource('producto', ProductoController::class)->only('index', 'show');

