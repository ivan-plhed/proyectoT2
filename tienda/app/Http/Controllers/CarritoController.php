<?php

namespace App\Http\Controllers;

use App\Models\LineaPedido;
use App\Models\Pedido;
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
        return redirect()->route('productos.index');
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

    public function confirmPedido()
    {
        $response = Http::withToken(CarritoController::API_TOKEN)
            ->get(CarritoController::API_URL, ['id_cliente' => auth()->user()->id]);

        $carrito = json_decode($response->body(), true);

        if (!$carrito)
            return redirect()->route('productos.index');

        $pedido = new Pedido();
        $pedido->id_cliente = auth()->user()->id;
        $pedido->email = auth()->user()->email;
        $pedido->nombre = auth()->user()->name;
        $pedido->fecha_compra = now();
        $pedido->save();

        foreach ($carrito as $linea_carrito) {
            $producto = Producto::find($linea_carrito['id_producto']);

            if ($producto) {
                $linea_pedido = new LineaPedido();
                $linea_pedido->pedido_id = $pedido->id;
                $linea_pedido->id_producto = $producto->id;
                $linea_pedido->nombre_producto = $producto->name;
                $linea_pedido->precio_producto = $producto->price;
                $linea_pedido->cantidad = $linea_carrito['cantidad'];
                $linea_pedido->precio_total = $producto->price * $linea_carrito['cantidad'];
                $linea_pedido->save();
            }
        }

        $pedido->load('lineas');

        Http::withToken(CarritoController::API_TOKEN)
            ->delete(
                CarritoController::API_URL . "/" . auth()->user()->id,
            );

        return view('pedido.index', compact('pedido'));
    }
}
