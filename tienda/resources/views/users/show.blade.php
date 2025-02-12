@extends('plantilla')
@section('titulo', 'Ver usuario')
@section('contenido')

    <div>
        <div class="mb-4">
            <p>DNI: {{ $user->dni }}</p>
            <p>Nombre: {{ $user->name }}</p>
            <p>E-mail: {{ $user->email }}</p>
            <p>Rol: {{ $user->role }}</p>
        </div>

        @if ($pedidos)
            @foreach ($pedidos as $pedido)
                @if ($pedido->lineas)
                    <h2>Pedido: {{ $pedido->id }}</h2>
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
                            <tr>
                                <td colspan="4" class="text-end">
                                    Total: {{ number_format($pedido->lineas->sum('precio_total'), 2) }}€
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            @endforeach
        @endif
    </div>
@endsection
