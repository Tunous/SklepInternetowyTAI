<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projekt z TAI</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body>
<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <div class="navbar-item">
                <span class="icon has-text-primary"><i class="fa fa-birthday-cake"></i></span>
            </div>
            <span class="navbar-burger burger" data-target="nav-menu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <div id="nav-menu" class="navbar-menu">
            <div class="navbar-start">
                <a href="/" class="navbar-item is-active">Strona Główna</a>
                <a href="/o-nas" class="navbar-item">O Nas</a>
                <a href="/produkty" class="navbar-item">Produkty</a>
            </div>
            <div class="navbar-end">
                <a href="/login" class="navbar-item">Logowanie</a>
                <div class="navbar-item">
                    <a href="/register" class="button is-primary">Rejestracja</a>
                </div>
            </div>
        </div>
    </div>
</nav>

@yield('header')

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                &copy 2017 Łukasz Rutkowski
            </p>
        </div>
    </div>
</footer>
</body>
</html>
