<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    function carrito() {
        return view('carrito.index');
    }

    function addItem(Request $request,Producto $producto) {
        return var_dump($producto) . '</hr>' . var_dump($request);
    }
}
