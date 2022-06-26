<x-front-layout>

    <section id="compte-user" class="main-flex">
        <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
        <div class="col-left">
            @auth
                @if (Request::getRequestUri()=='/mon-compte')
                    <a href="" class="button-menu">-Vos ressources mise de côté</a><br><br>
                    <a href="" class="button-menu">-Vos ressources favorites</a><br><br>
                    @if ( Auth::user()->Moderateur)
                        <a href="{{ route('ressources-a-valider.index') }}" class="button-menu">-Valider des ressources</a>
                    @endif
                @endif
            @endauth
        </div>
        <div class="col-center">
            <h2>Vos actualités et celles qui sont partagées avec vous</h2>
            <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte)-->
            @foreach ($ressources as $ressource)
                <div class="gerer-ressources">
                    <div class="ressources">
                        <div class="header-ressource">
                            <!--le titre de la ressource-->
                            <h2 id="titreRessource">{{ $ressource['titre'] }}</h2>
                            <div class="flex">
                                <!--le nom prenom de l'utilisateur-->
                                <h3 id="userNom">{{ $ressource['utilisateur']['name'] }}</h3>
                                <h3 id="userPrenom">{{ $ressource['utilisateur']['Prenom'] }}</h3>
                            </div>
                            <hr>
                        </div>
                        
                        <!--le contenu text de la ressource (description ou article)-->
                        <p id="contentRessource"disabled>{{ $ressource['contenu'] }}</p>

                        <div class="footer-ressource">
                            <div class="vue-like">
                                <!--affichage du nombre de commentaire-->
                                <p id="footerRessourceVue">vu {{ $ressource['nbVue'] }}</p>
                                <!--affichage du nombre de like-->
                                <p id="footerRessourceLike">aimé {{ $ressource['nbLike'] }}</p>
                                <a href="" class="lire-suite"> lire la suite </a>
                            </div>
                            <div class="group-btn-footer">
                                <select name="IdEtat" id="IdEtat">
                                    <option value="" selected>selectionner le type de publication</option>
                                    <option value="exemple">exemple</option>
                                    <option value="exemple">exemple</option>
                                </select>
                                <button id="publiRessource" class="crud-share">publier la ressource</button>
                                <button id="supprRessource" class="crud-share">supprimer la ressource</button>
                                <button id="modifRessource" class="crud-share">modifier la ressource</button>
                                <button id="publiRessource" onclick="openForm()" class="crud-share">partager la ressource</button>
                                <div class="login-popup">
                                    <div class="form-popup" id="popupForm">
                                        <form action="" class="form-container">
                                            @csrf
                                            <h2>Veuillez sélection un ou des utilisateurs pour partager</h2>
                                            <div class="user-relation">
                                                <!--@ - for - each-->
                                                <input type="checkbox" name="">le nom de l'utilisateur le prenom de l'utilisateur</input>
                                            </div>
                                            <div class="confirmation-share">
                                                <button type="submit" class="btn-share">partager</button>
                                                <button type="button" class="btn-cancel" onclick="closeForm()">Fermer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-right flex column">
        @auth
            @if (Request::getRequestUri()=='/mon-compte')
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
            @else

                <!------------------------------------------------------------->
                
                <!-- s'affiche que si l'id dans l'url et celui du user connecter sont différent -->
                <!--une liste de type de relation récupérer sur la bdd-->
                <select name="type" id="relation-select">
                    <option value="" selected>selectionner le type de relation</option>
                    <option value="ami">ami</option>
                    <option value="famille">famille</option>
                </select>
                <button class="ajoutRelation"> ajouter la relation</button>
            @endif
        @endauth
            <!------------------------------------------------------------->
        </div>
    </section>
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
</x-front-layout>