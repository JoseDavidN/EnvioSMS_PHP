<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicon_black.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@500;600&family=Open+Sans:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/05e74ce1fa.js" crossorigin="anonymous"></script>
    <title>@yield('tittle') - Startcode</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home"><img src="{{ asset('img/white_logo_transparent_background.png') }}" alt="Logo Startcode"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth <!-- si esta la sesion inciada -->
                        <li class="nav-item">
                            <span class="navbar-text">{{ auth()->user()->username }}</span>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link">Cerrar Sesion</a>
                        </li>
                    @endauth
                    
                    @guest
                        <li class="nav-item">
                            <a href="{{ url('/login') }}" class="nav-link">Iniciar Sesion</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/register') }}" class="nav-link">Registrarse</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            @yield('header')
            @yield('content')
        </div>
    </div>

    <div class="container-fluid footer">
        <div class="row">
            <div class="col">
                <p class="text-footer"><a href="https://startcode.com.co">startcode.com.co</a> <i class="fa-regular fa-copyright"></i> <span id="copyright"></span> Todos los derechos reservados</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.6.0.min') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>