@extends('plantilla')
@section('titulo', 'Ver usuario {{ $user->name }}')
@section('contenido')

    <p>DNI: {{ $user->dni }}</p>
    <p>Nombre: {{ $user->name }}</p>
    <p>E-mail: {{ $user->email }}</p>
    <p>Rol: {{ $user->role }}</p>
    <a href=" {{ route('user.edit', $user) }} "><button class="btn btn-primary">Editar</button></a>
    <form action="{{ route('user.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Eliminar" />
    </form>

    <a href="{{ route('user.index') }}">Volver</a>

@endsection
