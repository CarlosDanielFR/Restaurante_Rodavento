<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Hotel Rodavento'))</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --bg-dark: #0b1d26;
            --accent-gold: #fbd784;
            --text-light: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.7);
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .text-accent {
            color: var(--accent-gold) !important;
        }

        /* Navbar Styles */
        .navbar-custom {
            padding: 1.8rem 0;
            background: rgba(11, 29, 38, 0.6);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }

        .btn-auth-login {
            color: #ffffff;
            border: 1px solid transparent;
            padding: 0.4rem 1.2rem;
            border-radius: 4px;
            font-size: 0.875rem;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-auth-login:hover {
            color: var(--accent-gold);
            border-color: rgba(251, 215, 132, 0.4);
        }

        .btn-auth-register {
            color: var(--bg-dark);
            background-color: var(--accent-gold);
            border: 1px solid var(--accent-gold);
            padding: 0.4rem 1.2rem;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-auth-register:hover {
            background-color: #f7ca5d;
            border-color: #f7ca5d;
            color: var(--bg-dark);
        }

        /* Estilos genéricos para botones y footer */
        .btn-link-accent {
            color: var(--accent-gold);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: gap 0.3s ease;
        }

        .btn-link-accent:hover {
            color: #fff;
            gap: 15px;
        }

        footer {
            padding: 80px 0 40px 0;
            background-color: #0b1d26;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Header / Navbar global -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand font-serif fs-3 fw-bold tracking-wider" href="{{ url('/') }}">RODAVENTO</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-lg-4">
                <li class="nav-item"><a class="nav-link text-white fw-medium" href="{{ url('/#experiencia') }}">Experiencias</a></li>
                <li class="nav-item"><a class="nav-link text-white fw-medium" href="{{ url('/#habitaciones') }}">Habitaciones</a></li>
                <li class="nav-item"><a class="nav-link text-white fw-medium" href="{{ url('/#actividades') }}">Actividades</a></li>
            </ul>
        </div>

        <!-- Botones de Autenticación de Laravel -->
        <!-- Botones de Autenticación / Perfil de Usuario -->
        @if (Route::has('login'))
            <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                @auth
                    <!-- Menú Desplegable / Tarjeta del Usuario Logueado -->
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center gap-2 py-2 px-3 rounded-pill fs-7"
                                type="button"
                                id="userMenu"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="border-color: rgba(251, 215, 132, 0.3); background: rgba(11, 29, 38, 0.5);">

                            <!-- Icono o Avatar -->
                            <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 28px; height: 28px; font-size: 0.8rem; background-color: #fbd784 !important;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <!-- Nombre del Usuario -->
                            <span class="text-white fw-medium me-1">{{ Auth::user()->name }}</span>
                        </button>

                        <!-- Desplegable de opciones -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow-lg border-secondary mt-2"
                            aria-labelledby="userMenu"
                            style="background-color: #0b1d26; border-color: rgba(255,255,255,0.1);">

                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ url('/dashboard') }}">
                                    <i class="bi bi-speedometer2 text-accent"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ url('/profile') }}">
                                    <i class="bi bi-person-gear text-accent"></i> Mi Perfil
                                </a>
                            </li>
                            <li><hr class="dropdown-divider border-secondary opacity-25"></li>
                            <li>
                                <!-- Formulario para Cerrar Sesión en Laravel -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2 py-2">
                                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Si NO está logueado -->
                    <a href="{{ route('login') }}" class="btn-auth-login">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-auth-register">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>

<!-- Contenido dinámico de las páginas -->
<main>
    @yield('content')
</main>

<!-- Footer global -->
<footer>
    <div class="container">
        <div class="row gy-4 mb-5">
            <div class="col-lg-5">
                <h3 class="font-serif h4 text-white mb-3">RODAVENTO</h3>
                <p class="text-white-50 small pe-lg-5">
                    Hotel Rodavento Valle de Bravo.<br>
                    Una experiencia inigualable en la naturaleza.
                </p>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="text-accent mb-3">Más sobre Rodavento</h6>
                <ul class="list-unstyled text-white-50 small d-flex flex-column gap-2">
                    <li><a href="#" class="text-white-50 text-decoration-none">Sobre Nosotros</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Spa & Wellness</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Gastronomía</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-3">
                <h6 class="text-accent mb-3">Contacto</h6>
                <ul class="list-unstyled text-white-50 small d-flex flex-column gap-2">
                    <li><a href="#" class="text-white-50 text-decoration-none">Reservaciones</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Ubicación</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none">Preguntas Frecuentes</a></li>
                </ul>
            </div>
        </div>
        <div class="row border-top border-secondary border-opacity-25 pt-4">
            <div class="col-md-6 text-center text-md-start">
                <p class="text-white-50 small mb-0">&copy; {{ date('Y') }} Hotel Rodavento. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
