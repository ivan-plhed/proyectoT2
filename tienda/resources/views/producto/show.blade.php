@extends('plantilla')
@section('titulo', 'Ver usuario {{ $producto->name }}')
@section('contenido')

    <div>
        <p>Nombre: {{ $producto->name }}</p>
        <p>Precio: {{ $producto->price }}€</p>
        <form action="{{ route('addItem', $producto) }}" method="POST">
            @csrf
            @method('POST')
            <label for="cantidad" class="me-2">Cantidad:</label>
            <input type="number" class="form-control me-2" id="cantidad" name="cantidad"
                value="1" min="1">
                <input type="submit" class="btn btn-primary" value="Añadir al carrito">
        </form>
        <a href="{{ route('producto.index') }}">Volver a inicio</a>
    </div>
    <div>
        <img src="{{ $producto->img }}" alt="imagen-producto:{{ $producto->name }}">
    </div>
@endsection
