{{-- Example --}}
@if(auth()->check())
 <li class="{{ setActivo('libros.create') }} nav-item">
 <a class="nav-link" href="{{ route('libros.create') }}">Nuevo libro</a>
 </li>
@endif
