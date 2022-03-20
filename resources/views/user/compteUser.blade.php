<x-app-layout>

    <section id="compte-user" class="main-flex">
        <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
        <div class="col-left">
            @auth
            @if ( Auth::user()->Moderateur)
            <a href="{{ route('ressources-a-valider.index') }}" class="button-menu">Valider des ressources</a>
            @endif
            @endauth
        </div>
        <div class="col-center">
            <h2>Vos actualités et celles qui sont partagées avec vous</h2>
            <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte)-->
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
                    <textarea id="contentRessource"></textarea>

                    <div class="footer-ressource">
                        <div class="vue-like">
                            <!--affichage du nombre de commentaire-->
                            <p id="footerRessourceVue">nbr vue</p>
                            <!--affichage du nombre de like-->
                            <p id="footerRessourceLike">nbr like</p>
                        </div>
                        <div class="group-btn-footer">
                            <a href="" class="btn-footer"> lire la suite </a>
                            <button id="supprRessource" class="crud-share">supprimer la ressource</button>
                            <button id="modifRessource" class="crud-share">modifier la ressource</button>
                            <button id="publiRessource" class="crud-share">publier la ressource</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-right flex column">
        @auth
        @if (Route::is('monCompte'))
            <h1>Vos informations :</h1>
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
            @else

            <!------------------------------------------------------------->
            
            <!-- s'affiche que si l'id dans l'url et celui du user connecter sont différent -->
            <!--une liste de type de relation récupérer sur la bdd-->
            <select name="type" id="relation-select">
                <option value="" selected>selectionner le type de relation</option>
                <option value="ami">ami</option>
                <option value="famille">famille</option>
            </select>
            <button> ajouter la relation</button>
            @endif
            @endauth
            <!------------------------------------------------------------->
        </div>
    </section>

</x-app-layout>