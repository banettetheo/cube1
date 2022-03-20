<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>cube 1</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css'); }}" rel="stylesheet">

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="body-main">
    <div class="header-menu">
        <div id="titre-logo">
            <img href="" src="{{ URL::asset('image/LogoCube1.PNG'); }}" id="logo">
        </div>
        <div class="menu">
            @if (Route::has('login'))
                @auth
                        <a href="" class="button-menu">accueil</a>
                        <p>/</p>
                        <a href="{{ route('monCompte') }}" class="button-menu">Mon compte</a>
                        <p>/</p>
                        <a href="{{ route('ressources.create') }}" class="button-menu">Créer une ressource</a>
                        <p>/</p>
                        <a href="" class="button-menu">Mes relations</a>
                    @else
                        <a href="{{ route('login') }}" class="button-menu">Connexion</a>
                        <p>/</p>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button-menu">Inscription</a>
                        @endif
                @endauth
            @endif
        </div>
    </div>
    {{ $slot }}
</body>

</html>