<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Master Keycaps</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth()->check() && auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="mr-auto">
            <ul class="navbar-nav">
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('users.show', auth()->user()) }}">̣¡Hola, {{ auth()->user()->name }}!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
                <a style="text-decoration:none;" class="text-dark mx-3 my-2" href="{{ route('carrito') }}">
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                </a>
            </ul>

        </div>
    </div>
</nav>
