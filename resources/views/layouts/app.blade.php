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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <!--<body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            //@include('layouts.navigation')-->
            <body class="body-main">
        <div id="titre-logo">
            <img src="{{ URL::asset('image/LogoCube1.PNG'); }}" id="logo">
            <h1 id="titre-app">(RE)SOURCES RELATIONNELLES</h1>

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                //{{ $slot }}
                @yield('content')

            </main>
        </div>
    </body>
</html>
