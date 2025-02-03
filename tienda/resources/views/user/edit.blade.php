@extends('plantilla')
@section('titulo', 'Editar usuario {{ $user->name }}')
@section('contenido')
    <form>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" value="{{ $user->dni }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">No compartiremos tu correo con nadie</div>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-select" name="role" id="role">
                @if ($user->role === 'admin')
                    <option value="user">user</option>
                    <option selected value="admin">admin</option>
                @else
                    <option selected value="user">user</option>
                    <option value="admin">admin</option>
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
    <a href="{{ route('user.index') }}">Volver a la lista</a>
@endsection
