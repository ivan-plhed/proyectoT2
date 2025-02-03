@extends('plantilla')
@section('titulo', 'Ver usuario {{ $producto->name }}')
@section('contenido')

    <p>Nombre: {{ $producto->name }}</p>
    <p>Precio: {{ $producto->price }}€</p>
    <img src="{{ $producto->img }}" alt="imagen-producto:{{$producto->name}}">
    <a href="{{ route('producto.index') }}">Volver a inicio</a>

@endsection
