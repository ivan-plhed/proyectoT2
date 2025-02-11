<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->has('id_cliente')) {
            return response()->json('Request Malformed', 400);
        }

        $carrito = Carrito::where('id_cliente', $request->input('id_cliente'))->get();

        if ($carrito) {
            return response()->json($carrito, 200);
        }

        return response()->json("Carrito not found for " . $request->input('id_cliente'), 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->has(['id_cliente', 'id_producto', 'cantidad'])) {
            return response()->json('Request Malformed', 400);
        }

        $carrito = Carrito::where('id_cliente', $request->input('id_cliente'))
            ->where('id_producto', $request->input('id_producto'))
            ->first();

        if (!$carrito) {
            $carrito = new Carrito();
            $carrito->id_cliente = $request->input('id_cliente');
            $carrito->id_producto = $request->input('id_producto');
            $carrito->cantidad = $request->input('cantidad');
        } else {
            $carrito->cantidad = $request->input('cantidad');
        }

        if ($carrito->save()) {
            return response()->json('Carrito item added successfully', 201);
        }

        return response()->json("Internal Server Error", 500);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        if (!$request->has(['id_producto', 'cantidad'])) {
            return response()->json("Request Malformed", 400);
        }

        $carrito = Carrito::where('id_cliente', $id_cliente)
            ->where('id_producto', $request->input('id_producto'))
            ->first();

        if (!$carrito) {
            return response()->json("Carrito not found for cliente: $id_cliente", 404);
        }

        $carrito->cantidad = $request->input('cantidad');

        if ($carrito->save()) {
            return response()->json("Carrito line changed successfully", 200);
        }

        return response()->json("Internal Server Error", 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id_cliente)
    {
        if ($request->has('id_producto')) {
            $deleted = Carrito::where('id_cliente', $id_cliente)
                ->where('id_producto', $request->input('id_producto'))
                ->delete();
        } else {
            $deleted = Carrito::where('id_cliente', $id_cliente)->delete();
        }

        if ($deleted) {
            return response()->json("Carrito deleted successfully", 200);
        }

        return response()->json("Internal Server Error", 500);
    }
}
