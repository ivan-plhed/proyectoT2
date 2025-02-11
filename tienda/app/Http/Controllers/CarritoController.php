<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarritoController extends Controller
{
    private const API_URL = "http://carrito/api/carrito";
    private const API_TOKEN = "JDysTQ0GAvGb2iCEFHdQ";
    public function carrito()
    {
        $response = Http::withToken(CarritoController::API_TOKEN)->get(CarritoController::API_URL, ['id_cliente' => auth()->user()->id]);
        $carritos = json_decode($response->body(), true);
        $lineas_carrito = [];
        $precioTotal = 0;
        foreach ($carritos as $carrito) {
            $producto = Producto::where('id', '=', $carrito['id_producto'])->first();
            $linea_carrito = [
                'id_producto' => $producto->id,
                'name_producto' => $producto->name,
                'img_producto' => $producto->img,
                'price_producto' => $producto->price,
                'cantidad' => $carrito['cantidad']
            ];
            array_push($lineas_carrito, $linea_carrito);
            $precioTotal += $producto->price * $linea_carrito['cantidad'];
        }
        return view('carrito.index', compact('lineas_carrito', 'precioTotal'));
    }

    public function addItem(Request $request, Producto $producto)
    {
        Http::withToken(CarritoController::API_TOKEN)->post(
            CarritoController::API_URL,
            [
                'id_cliente' => auth()->user()->id,
                'id_producto' => $producto->id,
                'cantidad' => $request->input('cantidad')
            ]
        );
        return redirect()->route('producto.index');
    }

    public function changeCantidadCarrito(Request $request)
    {
        Http::withToken(CarritoController::API_TOKEN)->put(
            CarritoController::API_URL . "/" . auth()->user()->id,
            [
                'id_producto' => $request->input('id_producto'),
                'cantidad' => $request->input('cantidad')
            ]
        );
        return redirect()->route('carrito');
    }

    public function deleteFromCarrito(Request $request)
    {
        if ($request->has('id_producto')) {
            Http::withToken(CarritoController::API_TOKEN)
                ->delete(
                    CarritoController::API_URL . "/" . auth()->user()->id,
                    [
                        'id_producto' => $request->input('id_producto')
                    ]
                );
            return redirect()->route('carrito');
        } else {
            Http::withToken(CarritoController::API_TOKEN)
                ->delete(
                    CarritoController::API_URL . "/" . auth()->user()->id,
                );
            return redirect()->route('index');
        }
    }
}
