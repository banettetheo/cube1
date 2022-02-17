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
        <div id="titre-logo">
            <img src="{{ URL::asset('image/LogoCube1.PNG'); }}" id="logo">
            <h1 id="titre-app">(RE)SOURCES RELATIONNELLES</h1>
        </div>
        @yield('content')
    </body>
</html>
