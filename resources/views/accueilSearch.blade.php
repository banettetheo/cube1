<x-guest-layout>
    <section id="accueilSearch" class="main-flex">
    {{ var_dump($utilisateur) }}
        <div class="col-center">
            <div class="flex header-recherche-filtre">
                <div class="recherche-user">
                    <form action="{{ route('utilisateur.search') }}">
                         <!--barre de recherche pour trouver un autre utilisateur-->
                        <input type="text" class="recherche" name="q" value="{{ request()->q ?? '' }}">
                        <button  class="valid-recherche">rechercher</button>
                    </form>
                </div>
            </div>
            <div>
                @foreach ($utilisateur as $userSearch)           
                    <div class="user">
                        <!--le nom prenom de l'utilisateur-->
                        <h3 id="userNom">{{ $userSearch['name'] }}</h3>
                        <h3 id="userPrenom">{{ $userSearch['Prenom'] }}</h3>
                        <!-- accède au compteUser de l'utilisateur (suite dans le fichier compteUser.blade.php le commentaire sous la section)-->
                        <a href=""> voir l'utilisateur </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-right">
            <h1> Jeux vidéo </h1>
            <div class="list-game">
                <a href="https://zutom.z-lan.fr/">
                    <i class="img-game zutom-bg"></i>
                </a>
                <a href="">
                    <i class="img-game img-game1"></i>
                </a>
                <a href="">
                    <i class="img-game img-game2"></i>
                </a>
                <a href="">
                    <i class="img-game img-game3"></i>
                </a>
                <a href="https://snake.io/">
                    <i class="img-game snake-bg"></i>
                </a>
                <a href="">
                    <i class="img-game img-game4"></i>
                </a>
                <a href="">
                    <i class="img-game img-game5"></i>
                </a>
                <a href="">
                    <i class="img-game img-game6"></i>
                </a>
                <a href="">
                    <i class="img-game img-game7"></i>
                </a>
            </div>
        </div>

    </section>
</x-guest-layout>