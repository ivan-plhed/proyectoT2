@extends('plantilla')
@section('titulo', 'Ver usuario {{ $user->name }}')
@section('contenido')

    <p>DNI: {{ $user->dni }}</p>
    <p>Nombre: {{ $user->name }}</p>
    <p>E-mail: {{ $user->email }}</p>
    <p>Rol: {{ $user->role }}</p>
    <a href="{{ route('user.index') }}">Volver a la lista</a>

@endsection
