@extends('plantilla')
@section('titulo', 'Lista de usuarios')
@section('contenido')
    <table>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Rol</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->dni }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td><a href=" {{ route('user.show', $user) }} "><button class="btn btn-primary">Ver</button></a></td>
                <td><a href=" {{ route('user.edit', $user) }} "><button class="btn btn-primary">Editar</button></a></td>
                <td>
                    <form action="{{ route('user.destroy', $user) }}" method="POST">
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
