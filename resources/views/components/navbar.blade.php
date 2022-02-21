<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Compuhelp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ explode('.', Route::currentRouteName())[0] == '' ? 'active' : '' }}"
                            aria-current="page" href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ explode('.', Route::currentRouteName())[0] == 'client' ? 'active' : '' }}"
                            href="/client">Directorio Clientes</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Usuarios</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ explode('.', Route::currentRouteName())[0] == 'product' ? 'active' : '' }}"
                            href="/product">Productos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Credito
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/credit">Consultar Cliente</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/payment/create">Nuevo Abono</a></li>
                            <li><a class="dropdown-item" href="/payment">Abonos</a></li>
                            <li><a class="dropdown-item" href="/credit/create">Nuevo Credito</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" method="POST" action="/logout">
                    @csrf
                    {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                    <button class="btn btn-outline-danger" type="submit">Cerrar Sesion</button>
                </form>
            </div>
        </div>
    </nav>
</div>
