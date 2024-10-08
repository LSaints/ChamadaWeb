<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChamadaWeb</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <header class="header mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Sistema de Gestão</h1>
            <nav>
                <a href="/profile" class="me-3">Perfil</a>
                <a href="{{ route('auth.logout')}}">Sair</a>
            </nav>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <h4 class="sidebar-title">Menu</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="/profile">Perfil</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-bp4F1l5d6cF6JdWo2IfFf9rB4w5aFJc8bzwIcMlCk34i4QFZ8xzw4ZTc1NTu8F7l1" crossorigin="anonymous"></script>
</body>
</html>
