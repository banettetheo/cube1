<nav class="navbar navbar-expand-lg navbar-dark">
    <div id="titre-logo">
        <img href="" src="{{ URL::asset('image/LogoCube1.PNG'); }}" id="logo" style="width:40%">
    </div>
    <button class="navbar-toggler" style="color:white;" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(auth()->check()==true)

            <li class="nav-item active">
                <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
                <a href="{{ route('accueil')}}" class="nav-link text-white">Accueil</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('monCompte')}}" class="nav-link text-white">Mon compte</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('ressources.create')}}" class="nav-link text-white">Créer une ressource</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('relations.index')}}" class="nav-link text-white">Mes relations</a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('accueil')}}" class="nav-link text-white">Accueil</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('accueil-utilisateurs')}}" class="nav-link text-white">Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login')}}" class="nav-link text-white">Connexion</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register')}}" class="nav-link text-white">Inscription</a>
            </li>
            @endif
            @endif
        </ul>
    </div>
</nav>