@extends('plantilla')
@section('titulo', 'Lista de usuarios')
@section('contenido')
<table>
    @forelse ($users as $user)



    @endforelse
</table>

@endsection
