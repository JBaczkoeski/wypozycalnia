<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Car rent</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1e48838dc2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo asset('/build/assets/app-4af4b9cc.css')?>" type="text/css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-border mb-1 shadow" style="background-color: rgb(13,33,59)">
    <div class="container-fluid">
        <a href="/" class="btn">
            <p class="mt-1 h3 brand text-white">CAR RENT</p>
        </a>
        <button class="navbar-toggler ms-4 ms-sm-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-6" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn @if(Request::is('/')) active @endif fw-bold text-white" href="/">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="btn @if(Request::is('samochody')) active @endif fw-bold text-white" href="/samochody">Samochody</a>
                </li>
                <li class="nav-item">
                    <a class="btn @if(Request::is('informacje')) active @endif fw-bold text-white" href="/informacje">Informacje</a>
                </li>
                <li class="nav-item">
                    <a class="btn @if(Request::is('kontakt')) active @endif fw-bold text-white"
                       href="/kontakt">Kontakt</a>
                </li>
            </ul>
        </div>
        @guest()
            <div class="container col-3 d-flex justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn @if(Request::is('logowanie')) active @endif fw-bold text-white" href="/logowanie">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn @if(Request::is('rejestracja')) active @endif fw-bold text-white"
                           href="/rejestracja">Rejestracja</a>
                    </li>
                </ul>
            </div>
        @endguest
        @auth()
            <div class="container col-2 d-flex justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item ms-2 mt-2">
                        <a href="/konto"
                           class="btn @if(Request::is('konto')) active @endif fw-bold text-white">Konto</a>
                    </li>
                    <li class="nav-item ms-2 mt-2">
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn fw-bold text-white">Wyloguj</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</nav>
@yield('content')
</body>
</html>
