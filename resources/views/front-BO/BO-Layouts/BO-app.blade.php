<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>cube 1</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css'); }}" rel="stylesheet">
    </head>
    <body class="body-main">
        <div class="menu-left">
            <button class="btn-menu-left">accueil</button>
            <button class="btn-menu-left">gestion des ressources</button>
            <button class="btn-menu-left">gestion des utilisateurs</button>
        </div>

        <div class="main-content">
        @yield('content')
    </body>
</html>