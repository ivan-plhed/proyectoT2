@extends('plantilla')
@section('titulo', 'Carrito')
@section('contenido')
    <div class="container row d-flex">
        <div class="col-8 row">
            @forelse ($lineas_carrito as $linea_carrito)
        <div class="card col-12 m-3 p-0">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ $linea_carrito['img_producto'] }}" class="img-fluid rounded-start" alt="{{ $linea_carrito['name_producto'] }}">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $linea_carrito['name_producto'] }}</h5>
                  <p class="card-text">Precio: {{floatval($linea_carrito['price_producto']) * intval($linea_carrito['cantidad'])}}€ ({{ $linea_carrito['price_producto'] }}/ud)</p>
                    <form action="{{route('carritoChange')}}" method="GET">
                        <input name="id_producto" id="id_producto" type="text" value="{{$linea_carrito['id_producto']}}" hidden>
                        @csrf
                        @method('GET')
                        <label for="cantidad" class="me-2">Cantidad:</label>
                    <input type="number" class="form-control me-2 w-25 my-1" id="cantidad" name="cantidad" value="{{ $linea_carrito['cantidad'] }}" min="1">
                    <input type="submit" class="btn btn-primary me-2 my-2" value="Actualizar">
                    </form>
                    <a href="{{route('carritoDelete', $linea_carrito)}}"><button class="btn btn-danger eliminar-carrito" >Eliminar</button></a>
                </div>
              </div>
            </div>
          </div>
        @empty
            <h1>No hay productos en el carrito</h1>
        @endforelse
        </div>
        <div class="d-flex col-4 flex-column p-5">
            <h1 class="text-center w-100">Total: {{$precioTotal}}€ </h1>
            <a href="{{route('confirmPedido')}}"><button class="btn btn-primary w-100">Comprar</button></a>
        </div>
    </div>
@endsection
