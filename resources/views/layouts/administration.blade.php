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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


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
                        <a href="{{ route('monCompte') }}" class="button-menu">Gestion des comptes</a>
                        <p>/</p>
                        <a href="{{ route('ressources.create') }}" class="button-menu">Gestion des catalogues</a>
                        <p>/</p>
                        <a href="" class="button-menu">Tableaux de bords</a>
                        <p>/</p>
                        <a href="{{ route('login') }}" class="button-menu">Accès back-office</a>
                        <form method="POST" action="{{ route('logout') }}" class="form-deconnexion">
                @csrf
                <x-button class="button-menu">{{ __('Déconnexion') }}</x-button>
            </form>
                
                @endauth
            @endif
        </div>
    </div>
    {{ $slot }}
</body>

</html>