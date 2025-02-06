@extends('plantilla')
@section('titulo', 'Nuevo usuario')
@section('contenido')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" id="dni" value="{{ old('dni') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">No compartiremos tu correo con nadie</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" name="role" id="role">
                <option value="user" selected >User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>



    <a href="{{ route('user.index') }}">Volver a la lista</a>
@endsection
