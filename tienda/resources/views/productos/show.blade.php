@extends('plantilla')
@section('titulo', 'Ver producto')
@section('contenido')

    <div class="p-5">
        <h2>{{ $producto->name }}</h2>
        <p>{{ number_format($producto->price, 2)}}€</p>
        <form action="{{ route('add-item', $producto) }}" method="POST">
            @csrf
            @method('POST')
            <label for="cantidad" class="me-2">Cantidad:</label>
            <input type="number" class="form-control me-2" id="cantidad" name="cantidad"
                value="1" min="1">
                <div class="my-2">
                    <input type="submit" class="btn btn-dark" value="Añadir al carrito">
                </div>
        </form>
    </div>
    <div class="p-5">
        <img src="/imgs/{{ $producto->img }}" alt="imagen-producto:{{ $producto->name }}">
    </div>
@endsection
