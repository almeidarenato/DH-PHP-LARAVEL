<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" />
    <link rel="icon" type="image/png" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("css/app.css")}}"/>
    <script defer src={{asset("js/app.js")}} >
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="30" height="30" class="d-inline-block mr-2" alt="Laravel" />
                Blockbuster DH
            </a>
            <ul class="navbar-nav flex-row mr-auto">
                @guest
                <li class="nav-item">
                        <a href="/" class="nav-link pr-2">Home</a>
                    </li>
                    <li class="nav-item">
                            <a href="/login" class="nav-link pr-2">Login</a>
                        </li>
                @else
                <li class="nav-item">
                    <a href="/filmes" class="nav-link pr-2">Filmes</a>
                </li>
                <li class="nav-item">
                    <a href="/filmes/adicionar" class="nav-link pr-2">Cadastrar Filmes</a>
                </li>
                <li class="nav-item">
                    <a href="/generos" class="nav-link pr-2">Gêneros</a>
                </li>
                <li class="nav-item">
                    <a href="/generos/adicionar" class="nav-link pr-2">Cadastrar Gêneros</a>
                </li>
                @endguest
            </ul>
        </nav>
    </header>
    <main class="container my-5">
        @yield('content')
    </main>
</body>

</html>
