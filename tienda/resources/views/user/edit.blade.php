@extends('plantilla')
@section('titulo', 'Editar usuario {{ $user->name }}')
@section('contenido')
    <form action="{{ route('user.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">No compartiremos tu correo con nadie</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" name="role" id="role">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>



    <a href="{{ route('user.index') }}">Volver a la lista</a>
@endsection
