<x-app-layout>

    <section id="ressource-validation" class="main-flex">
        <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
        <div class="col-left">
            @auth
            <a href="" class="button-menu">-Vos ressources mise de côté</a><br><br>
            <a href="" class="button-menu">-Vos ressources favorites</a><br><br>
            @if ( Auth::user()->Moderateur)
            <a href="{{ route('ressources-a-valider.index') }}" class="button-menu">-Valider des ressources</a>
            @endif
            @endauth
        </div>
        <div class="col-center">
            <h2>Liste des ressources à valider pour la publication</h2>
            <!-- faire un foreach pour récupérer les ressource et afficher les éléments titre/auteur/contenu(image texte)-->
            <div class="gerer-ressources">
                <div class="ressources">
                    <div class="header-ressource">
                        <!--le titre de la ressource-->
                        <h2 id="titreRessource">Titre de la ressource et en plus très long pour pouvoir tester les grands titres</h2>
                        <div class="flex">
                            <!--le nom prenom de l'utilisateur-->
                            <h3 id="userNom">le nom de l'utilisateur</h3>
                            <h3 id="userPrenom">le prenom de l'utilisateur</h3>
                        </div>
                        <hr>
                    </div>
                    <!--le contenu text de la ressource (description ou article)-->
                    <p id="contentRessource"></p>
                    <div class="footer-ressource">
                        <div class="vue-like">
                            <!--affichage du nombre de commentaire-->
                            <p id="footerRessourceVue">nbr vue</p>
                            <!--affichage du nombre de like-->
                            <p id="footerRessourceLike">nbr like</p>
                            <a href="" class="lire-suite"> lire la suite </a>
                        </div>
                        <div class="group-btn-footer">
                            <button class="crud-share">refuser la publication</button>
                            <button class="crud-share">accepter la publication</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-right flex column">
        @auth 
            <h1>Vos informations</h1>
            <p id="nom">{{ Auth::user()->name}}</p>
            <p id="prenom">{{ Auth::user()->Prenom}}</p>
            <!------------------------------------------------------------->
            <!-- s'affiche que si l'id dans l'url et celui du user connecter sont les mêmes -->
            <p id="adresse-mail">{{ Auth::user()->email}}</p>
                            <a id="changeMDP" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('changer-mot-de-passe') }}">
                    {{ __('Changer de mot de passe') }}
                </a>

            <form method="POST" action="{{ route('logout') }}" class="form-deconnexion">
                @csrf
                <x-button class="button-menu">{{ __('Déconnexion') }}</x-button>
            </form>
        @endauth
        </div>
    </section>

</x-app-layout>