<x-app-layout>

    <section id="compte-ser" class="main-flex">
        <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
        <div class="col-left">
            <button class="button-menu">créer une ressource</button>
            <!-- accède à la page mesRelation.blade.php -->
            <button class="button-menu">voir mes relation</button>
        </div>
        <div class="col-center">
            <h2>Liste de vos actualités et celles qui sont partagé avec vous</h2>
            <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte)-->
            <div class="ressources">
                <div class="col-leftUser">
                    <!--le titre de la ressource-->
                    <h2 id="titreRessource"></h2>
                    <!--le nom de l'utilisateur qui l'a partagé-->
                    <h3 id="userRessource"></h3>
                    <!--le contenu text de la ressource (description ou article)-->
                    <textarea id="contentRessource"></textarea>
                    <!--affichage du nombre de commentaire-->
                    <input id="footerRessourceCom"> </input>
                    <!--affichage du nombre de like-->
                    <input id="footerRessourceLike"> </input>
                    <button href=""> lire la suite </button>
                </div>
                <div class="colr-rightUser">
                    <button id="supprRessource">supprimer la ressource</button>
                    <button id="modifRessource">modifier la ressource</button>
                    <button id="publiRessource">publier la ressource</button>
                </div>
            </div>
        </div>
        <div class="col-right flex column">
            <h1>Vos information :</h1>
            <p id="nom">nom</p>
            <p id="prenom">prenom</p>
            <!------------------------------------------------------------->
            <!-- s'affiche que si l'id dans l'url et celui du user connecter sont les mêmes -->
            @auth
            <p id="adresse-mail">{{ Auth::user()->email}}</p>
            <button id="changeMDP">changer de mot de passe</button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-button class="button-menu">{{ __('Déconnexion') }}</x-button>
            </form>
            @endauth
            <!------------------------------------------------------------->

            <!-- s'affiche que si l'id dans l'url et celui du user connecter sont différent -->
            <!--une liste de type de relation récupérer sur la bdd-->
            <select name="type" id="relation-select">
                <option value="" selected>selectionner le type de relation</option>
                <option value="ami">ami</option>
                <option value="famille">famille</option>
            </select>
            <button> ajouter la relation</button>
            <!------------------------------------------------------------->
        </div>
    </section>

</x-app-layout>