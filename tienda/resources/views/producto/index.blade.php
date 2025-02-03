@extends('plantilla')
@section('titulo', 'Inicio')
@section('contenido')
    <div class="row container d-flex">
        @forelse ($productos as $producto)
            <div class="card d-flex flex-column m-4" style="width: 18rem;">
                <a class="mt-2" href="{{route('producto.show', $producto)}}">
                    <img src="{{$producto->img}}" class="card-img-top" alt="imagen-producto:{{$producto->name}}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{$producto->name}}</h5>
                    <p class="card-text">{{$producto->price}}</p>
                    <a href="#" class="btn btn-primary">Añadir al carrito</a>
                </div>
            </div>
        @empty
            <h1>No hay productos</h1>
        @endforelse
    </div>
@endsection
