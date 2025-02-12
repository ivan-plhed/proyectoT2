@extends('plantilla')
@section('titulo', 'Inicio')
@section('contenido')
    <div class="container mt-4">
        <h2 class="mb-4">Detalles del Pedido</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Información del Cliente</h5>
                <p><strong>Nombre:</strong> {{ $pedido->nombre }}</p>
                <p><strong>Email:</strong> {{ $pedido->email }}</p>
                <p><strong>Fecha de Compra:</strong> {{ $pedido->fecha_compra }}</p>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->lineas as $linea)
                    <tr>
                        <td>{{ $linea->nombre_producto }}</td>
                        <td>{{ number_format($linea->precio_producto, 2) }}€</td>
                        <td>{{ $linea->cantidad }}</td>
                        <td>{{ number_format($linea->precio_total, 2) }}€</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end">
            <h4 class="mt-3">Total: {{ number_format($pedido->lineas->sum('precio_total'), 2) }}€</h4>
        </div>
    </div>
@endsection
