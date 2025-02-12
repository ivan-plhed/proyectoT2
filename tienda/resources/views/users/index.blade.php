@extends('plantilla')
@section('titulo', 'Lista de usuarios')
@section('contenido')
    <table  class="table w-50">
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Rol</th>
            <th colspan="3"><a href=" {{ route('users.create') }} "><button class="btn btn-dark">Nuevo Usuario</button></a></th>
        </tr>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td><a href=" {{ route('users.show', $user) }} "><button class="btn btn-dark">Ver</button></a></td>
                <td><a href=" {{ route('users.edit', $user) }} "><button class="btn btn-dark">Editar</button></a></td>
                <td>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Eliminar" />
                    </form>
                </td>
            </tr>
        @empty
            <h1>No hay usuarios</h1>
        @endforelse
    </table>
@endsection
