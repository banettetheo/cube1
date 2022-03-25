<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>cube 1</title>

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style type="text/css">
        .color-charte {
            background-color: #03989e;
        }

        .color-charte-verte {
            background-color: #65a581;
            color: white;
        }

        .nav-item {
            color: white;
            margin-top: 1em;
            border-color: white;
            border-bottom: solid 0.01em;
            margin-left: 1em;
            margin-right: 1em;
        }
    </style>
    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="body-main color-charte" style="margin: 0">
    <div class="">

        <div class="row m-0">

            @auth


            <div class="header-menu col-2 p-0 color-charte">
                <div class="" style="height: 100vh;">
                    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- <span class="navbar-toggler-icon"></span> -->
                        <img href="" src="{{ URL::asset('image/LogoCube1.PNG'); }}" style="width:150px;" id="logo">
                    </button>
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="{{route('administration.panel')}}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('administration.gestion-comptes.index')}}">Gestion des comptes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link text-white" href="">Gestion des catalogues</a> -->
                            <a class="sub-menu nav-link text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des catalogues<div class='pl-2 fa fa-caret-down right'></div></a>
                            <ul>
                                <a class="nav-link text-white" href="#tab2Id">Types de ressource</a>
                                <a class="nav-link text-white" href="#tab3Id">Types de relation</a>
                                <a class="nav-link text-white" href="#tab3Id">Types de catégories</a>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('administration.tableaux-de-bord.index')}}">Tableaux de bords</a>
                        </li>
                        @if ( Auth::user()->SuperAdmin)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Accès back-office</a>
                        </li>
                        @endIf
                        <li class=" mt-5">
                            <form method="POST" action="{{ route('logout') }}" class="form-deconnexion nav-link">
                                @csrf
                                <button class="btn btn-outline-light">Déconnexion</button>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-10 bg-white p-0">
                @endAuth
                {{ $slot }}

            </div>
        </div>
    </div>

    </div>

</body>

</html>